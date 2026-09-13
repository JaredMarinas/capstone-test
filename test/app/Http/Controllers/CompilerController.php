<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompilerController extends Controller
{
    // 1. This method was missing. It loads your compiler.blade.php view.
    public function index()
    {
        return view('compiler');
    }

    // 2. This method handles the code execution via JDoodle.
    public function run(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'language' => 'required|string'
        ]);

        $jdoodleMap = [
            'java' => ['language' => 'java', 'versionIndex' => '4'],
            'python' => ['language' => 'python3', 'versionIndex' => '3'],
            'csharp' => ['language' => 'csharp', 'versionIndex' => '4']
        ];

        $langConfig = $jdoodleMap[$request->language] ?? $jdoodleMap['python'];

        $response = Http::post('https://api.jdoodle.com/v1/execute', [
            'clientId' => env('JDOODLE_CLIENT_ID'),
            'clientSecret' => env('JDOODLE_CLIENT_SECRET'),
            'script' => $request->code,
            'language' => $langConfig['language'],
            'versionIndex' => $langConfig['versionIndex']
        ]);

        if ($response->successful()) {
            $result = $response->json();
            
            return response()->json([
                'output' => $result['output'] ?? 'Execution completed with no output.'
            ]);
        }

        return response()->json([
            'error' => 'API Error (' . $response->status() . '): ' . $response->body()
        ], $response->status());
    }
}