<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Code Terminal</title>
    
    <!-- REQUIRED: CodeMirror core CSS and Theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/theme/dracula.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050505] text-[#CECBF6] font-mono m-0 p-5">
    <div class="flex gap-4 h-[90vh]">
        
        <div class="flex-1 bg-transparent border border-[#CECBF6]/15 rounded-lg p-5 flex flex-col [&>.CodeMirror]:grow [&>.CodeMirror]:rounded [&>.CodeMirror]:text-[16px] [&>.CodeMirror]:h-auto">
            <div class="flex gap-2.5 mb-[15px]">
                <select id="languageSelect" onchange="changeLanguage()" class="bg-transparent text-[#CECBF6] border border-[#CECBF6]/15 px-5 py-2.5 uppercase font-bold rounded cursor-pointer transition-all duration-200 outline-none focus:bg-[#CECBF6] focus:text-black focus:shadow-[0_0_15px_rgba(206,203,246,0.8)]">
                    <option value="java" data-mode="text/x-java">Java</option>
                    <option value="python" data-mode="text/x-python">Python</option>
                    <option value="csharp" data-mode="text/x-csharp">C#</option>
                </select>
                <button class="bg-transparent text-[#CECBF6] border border-[#CECBF6]/15 px-5 py-2.5 uppercase font-bold rounded cursor-pointer transition-all duration-200 hover:bg-[#CECBF6] hover:text-black hover:shadow-[0_0_15px_rgba(206,203,246,0.8)]" onclick="runCode()">Execute Script</button>
            </div>
            <textarea id="code"></textarea>
        </div>
        
        <div class="flex-1 bg-transparent border border-[#CECBF6]/15 rounded-lg p-5 flex flex-col">
            <h3 class="mt-0 uppercase tracking-[2px] font-bold mb-4">Terminal Output</h3>
            <div class="grow bg-black text-[#CECBF6] p-[15px] rounded border border-[#333] overflow-y-auto whitespace-pre-wrap" id="output">// Awaiting execution...</div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/clike/clike.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/python/python.min.js"></script>
    
    <script>
        const templates = {
            java: 'public class Main {\n    public static void main(String[] args) {\n        System.out.println("System activated.");\n    }\n}',
            python: 'print("System activated.")',
            csharp: 'using System;\nclass Program {\n    static void Main() {\n        Console.WriteLine("System activated.");\n    }\n}'
        };

        var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            mode: "text/x-java",
            theme: "dracula",
            lineNumbers: true
        });
        
        editor.setValue(templates.java);

        function changeLanguage() {
            const select = document.getElementById("languageSelect");
            const selectedOption = select.options[select.selectedIndex];
            const lang = select.value;
            
            editor.setOption("mode", selectedOption.getAttribute("data-mode"));
            editor.setValue(templates[lang]); 
        }

        async function runCode() {
            const outputDiv = document.getElementById('output');
            const selectedLanguage = document.getElementById('languageSelect').value;
            
            outputDiv.style.color = "#ff0";
            outputDiv.innerText = "> Compiling and executing...";

            try {
                const response = await fetch('/run-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ 
                        code: editor.getValue(), 
                        language: selectedLanguage 
                    })
                });

                const data = await response.json();
                outputDiv.style.color = data.error ? "#f00" : "#0f0";
                outputDiv.innerText = data.output || data.error || "Execution completed with no output.";
            } catch (e) {
                outputDiv.style.color = "#f00";
                outputDiv.innerText = "Network error. Server unreachable.";
            }
        }
    </script>
</body>
</html>