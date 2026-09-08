<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompilerController extends Controller
{
    // Define explicit Judge0 numerical language IDs
    private const LANGUAGES = [
        'c'      => 50, // C (GCC 9.2.0)
        'cpp'    => 54, // C++ (GCC 9.2.0)
        'java'   => 62, // Java (OpenJDK 13.0.1)
        'go'     => 60, // Go (1.13.5)
        'rust'   => 73, // Rust (1.40.0)
        'csharp' => 51, // C# (Mono 6.6.0.161)
    ];

    public function compile(Request $request)
    {
        // 1. Validate the incoming editor submission
        $validated = $request->validate([
            'language' => 'required|string',
            'code'     => 'required|string',
        ]);

        $lang = strtolower($validated['language']);

        if (!array_key_exists($lang, self::LANGUAGES)) {
            return response()->json(['error' => 'Unsupported language selection.'], 400);
        }

        $languageId = self::LANGUAGES[$lang];

        // 2. Make an execution request to a public Judge0 instance
        // We append '?wait=true' to get the execution results immediately in a single call
        $response = Http::post('https://rapidapi.com', [
            'source_code' => $validated['code'],
            'language_id' => $languageId,
            'stdin'       => '', // Pass programmatic inputs here if needed
        ]);

        /* 
         * NOTE: If you are using a self-hosted local Judge0 via Docker instead of RapidAPI,
         * change the target endpoint URL to your local sandbox path:
         * 'http://localhost:2358/submissions?wait=true'
         */

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to reach Judge0 compiler engine.'], 500);
        }

        $result = $response->json();

        // 3. Extract outputs based on Judge0's processing layout
        // If status ID is 6, it indicates a strict Syntax/Compilation Error
        $isCompilationError = isset($result['status']['id']) && $result['status']['id'] === 6;
        $compileErrorOutput = $result['compile_output'] ?? '';

        return response()->json([
            'success' => true,
            'stdout'  => $result['stdout'] ?? '',
            'stderr'  => $isCompilationError ? $compileErrorOutput : ($result['stderr'] ?? ''),
            'code'    => $result['status']['id'] ?? 0,
        ]);
    }
}
