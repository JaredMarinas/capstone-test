<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>test</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav class="max-w-3xl mx-auto px-6 py-4 bg-slate-100 rounded-full text-lg shadow-lg mt-4" id="navbar">
            <div class=" mx-auto p-2 text-black flex items-center justify-evenly">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
        </nav>
        <main class="m-10 min-h-screen px-10"> 
            <div class="w-full flex flex-col justify-center items-center">
                <div class="w-1/2 flex text-white flex-col justify-center items-center">
                    <img src="{{ Vite::asset('resources/images/dp.jpeg') }}" alt="Laravel Logo" class="rounded-full w-[30%] h-[30%] object-cover">
                    <p class=" p-2 text-3xl font-semibold"> Full Stack Zen </p>
                </div>
                <p class="text-xl mt-5 text-white/75 text-center font-semibold">Performance Summary</p>
                <div class="w-[75%] font-semibold text-white mt-4 flex flex-row justify-evenly items-center ">
                    <div class="flex flex-col border-2 rounded-2xl w-[20%] justify-center items-center border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <x-heroicon-o-trophy class="w-13 h-13 p-2 text-yellow-500" />
                        <p class="text-2xl font-semibold">10</p>
                        <p class="text-md p-2">Total Score</p>
                    </div>
                    <div class="flex flex-col border-2 rounded-2xl w-[20%] justify-center items-center border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <x-heroicon-o-check-badge class="w-13 h-13 p-2 text-green-500" />
                        <p class="text-2xl font-semibold">25%</p>
                        <p class="text-md p-2">Accuracy</p>
                    </div>
                    <div class="flex flex-col border-2 rounded-2xl w-[20%] justify-center items-center border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <x-heroicon-o-book-open class="w-13 h-13 p-2 text-blue-500" />
                        <p class="text-2xl font-semibold">15</p>
                        <p class="text-md p-2">Completed</p>
                    </div>
                </div>
                <hr class="w-full my-6 border-t-2 border-white/25">

                <div class="w-full mt-5 flex justify-evenly items-center">
                    
                    <div class=" flex flex-col border-2 mx-5 rounded-2xl w-[80%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <div class="flex justify-between items-center w-full p-2">
                            <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
                            <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
                        </div>
                        <div class="my-1 p-2">
                                <p class="text-lg font-semibold text-white">Discrete Mathematics</p>
                                <p class="text-xs text-white/80">8 quizzes available</p>
                                <div class="flex justify-evenly items-center mt-2">
                                    <div class=" flex flex-row items-center w-full gap-1 pt-2">
                                        <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                                        <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                                    </div>
                                </div>
                            </div>
                    </div>

                   <div class=" flex flex-col border-2 mx-5 rounded-2xl w-[80%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <div class="flex justify-between items-center w-full p-2">
                            <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
                            <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
                        </div>
                        <div class="my-1 p-2">
                                <p class="text-lg font-semibold text-white">Computer Programming 1</p>
                                <p class="text-xs text-white/80">8 quizzes available</p>
                                <div class="flex justify-evenly items-center mt-2">
                                    <div class=" flex flex-row items-center w-full gap-1 pt-2">
                                        <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                                        <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class=" flex flex-col border-2 mx-5 rounded-2xl w-[80%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <div class="flex justify-between items-center w-full p-2">
                            <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
                            <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
                        </div>
                        <div class="my-1 p-2">
                                <p class="text-lg font-semibold text-white">Data Structures and Algorithms</p>
                                <p class="text-xs text-white/80">8 quizzes available</p>
                                <div class="flex justify-evenly items-center mt-2">
                                    <div class=" flex flex-row items-center w-full gap-1 pt-2">
                                        <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                                        <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class=" flex flex-col border-2 mx-5 rounded-2xl w-[80%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <div class="flex justify-between items-center w-full p-2">
                            <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
                            <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
                        </div>
                        <div class="my-1 p-2">
                                <p class="text-lg font-semibold text-white">Computer Programming 2</p>
                                <p class="text-xs text-white/80">8 quizzes available</p>
                                <div class="flex justify-evenly items-center mt-2">
                                    <div class=" flex flex-row items-center w-full gap-1 pt-2">
                                        <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                                        <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </main>
    </body>
</html>
