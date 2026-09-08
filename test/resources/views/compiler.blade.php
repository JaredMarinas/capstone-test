<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Compiler Test</title>
    <!-- Include Tailwind CSS for quick styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col font-sans">

    <!-- Top Header Navigation Bar -->
    <header class="bg-slate-800 text-white p-4 flex justify-between items-center shadow">
        <h1 class="text-xl font-bold">🛠️ Laravel Piston Compiler Test</h1>
        <div class="flex items-center gap-4">
            <select id="languageSelect" class="bg-slate-700 text-white px-3 py-1.5 rounded border border-slate-600 focus:outline-none">
                <option value="cpp">C++</option>
                <option value="c">C</option>
                <option value="java">Java</option>
                <option value="go">Go</option>
                <option value="rust">Rust</option>
                <option value="csharp">C#</option>
            </select>
            <button id="runBtn" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-1.5 rounded transition">Run Code ▶</button>
        </div>
    </header>

    <!-- Main Workspace Area -->
    <main class="flex-1 flex overflow-hidden">
        <!-- Left Pane: Code Input Area -->
        <div class="w-1/2 p-4 flex flex-col border-r border-gray-300">
            <label class="text-sm font-semibold text-gray-700 mb-2">Write Code Here:</label>
            <textarea id="codeEditor" class="flex-1 p-4 bg-slate-900 text-gray-100 font-mono text-sm rounded resize-none focus:outline-none shadow-inner" spellcheck="false">#include <iostream>

int main() {
    std::cout << "Hello from C++ inside Laravel!" << std::endl;
    return 0;
}</textarea>
        </div>

        <!-- Right Pane: Terminal Output Area -->
        <div class="w-1/2 p-4 flex flex-col bg-slate-950 text-emerald-400 font-mono text-sm">
            <label class="text-sm font-semibold text-gray-400 mb-2">Terminal Output:</label>
            <div id="terminal" class="flex-1 p-4 bg-black rounded overflow-y-auto whitespace-pre-wrap">Click "Run Code" to compile and see output...</div>
        </div>
    </main>

    <!-- JavaScript Execution Logic -->
    <script>
        // Preset boilerplates for languages to make testing easier
        const boilerplates = {
            cpp: `#include <iostream>\n\nint main() {\n    std::cout << "Hello from C++ inside Laravel!" << std::endl;\n    return 0;\n}`,
            c: `#include <stdio.h>\n\nint main() {\n    printf("Hello from C inside Laravel!\\n");\n    return 0;\n}`,
            java: `public class Main {\n    public static void main(String[] args) {\n        System.out.println("Hello from Java inside Laravel!");\n    }\n}`,
            go: `package main\nimport "fmt"\n\nfunc main() {\n    fmt.Println("Hello from Go inside Laravel!")\n}`,
            rust: `fn main() {\n    println!("Hello from Rust inside Laravel!");\n}`,
            csharp: `using System;\n\nclass MainClass {\n    static void Main() {\n        Console.WriteLine("Hello from C# inside Laravel!");\n    }\n}`
        };

        const languageSelect = document.getElementById('languageSelect');
        const codeEditor = document.getElementById('codeEditor');
        const runBtn = document.getElementById('runBtn');
        const terminal = document.getElementById('terminal');

        // Swap template code when the selected language drops down
        languageSelect.addEventListener('change', (e) => {
            codeEditor.value = boilerplates[e.target.value] || '';
        });

        // Trigger code execution via API request
        runBtn.addEventListener('click', async () => {
            terminal.innerText = "Compiling and running code...";
            runBtn.disabled = true;
            runBtn.innerText = "Running...";

            try {
                const response = await fetch('/compile', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        language: languageSelect.value,
                        code: codeEditor.value
                    })
                });

                const data = await response.json();
                runBtn.disabled = false;
                runBtn.innerText = "Run Code ▶";

                if (data.success) {
                    // Display compiler errors if stdout is completely empty but stderr has info
                    if (!data.stdout && data.stderr) {
                        terminal.className = "flex-1 p-4 bg-black rounded overflow-y-auto whitespace-pre-wrap text-red-400";
                        terminal.innerText = data.stderr;
                    } else {
                        // Print ordinary execution standard output
                        terminal.className = "flex-1 p-4 bg-black rounded overflow-y-auto whitespace-pre-wrap text-emerald-400";
                        terminal.innerText = data.stdout + (data.stderr ? `\n\n[Errors]:\n${data.stderr}` : '');
                    }
                } else {
                    terminal.className = "flex-1 p-4 bg-black rounded overflow-y-auto whitespace-pre-wrap text-red-500 font-bold";
                    terminal.innerText = `Error: ${data.error || 'Something went wrong.'}`;
                }
            } catch (error) {
                runBtn.disabled = false;
                runBtn.innerText = "Run Code ▶";
                terminal.className = "flex-1 p-4 bg-black rounded overflow-y-auto whitespace-pre-wrap text-red-500 font-bold";
                terminal.innerText = `Network Error: Unable to communicate with backend.`;
                console.error(error);
            }
        });
    </script>
</body>
</html>
