<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>test</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>

   <div class="md:flex md:justify-center md:w-full md:pt-10">
   <!-- We add x-data="{ open: false }" to track the menu state -->
<nav x-data="{ open: false }" class="bg-[#4C1D95] text-[#CECBF6] md:w-[50%] md:rounded-full font-semibold p-4 shadow-lg">
  <div class="flex justify-between items-center max-w-4xl mx-auto">
    
    <div class="font-bold text-xl tracking-wider">
      Smart E-learning
    </div>
    <!-- The Button -->
    <button @click="open = !open" class="md:hidden focus:outline-none hover:text-white transition-colors">
      <!-- 1. The Heroicon HAMBURGER (Shows when menu is closed) -->
      <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>

      <!-- 2. The Heroicon 'X' (Shows when menu is open) -->
      <!-- x-cloak prevents it from flashing on the screen when the page first loads -->
      <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
      </svg>

    </button>

    <!-- Desktop Menu (Hidden on mobile) -->
    <div class="hidden md:flex space-x-6 text-sm font-semibold">
      <a href="#" class="hover:text-white transition-colors">Modules</a>
      <a href="#" class="hover:text-white transition-colors">Practice Tests</a>
    </div>
  </div>

  <!-- Mobile Dropdown Menu (Controlled by the Heroicons button) -->
  <div x-show="open" class="md:hidden flex flex-col items-center gap-4 mt-6 pb-4">
      <a href="#" class="hover:text-white">Modules</a>
      <a href="#" class="hover:text-white">Practice Tests</a>
      <a href="#" class="hover:text-white">Profile</a>
  </div>
</nav>
</div>

<main class="min-h-screen flex flex-col justify-center items-center mt-10">

  <div class="w-full flex flex-col justify-center gap-3">
    <div class="text-[#CECBF6] items-center flex flex-col">
      <img src="{{ Vite::asset('resources/images/dp.jpeg') }}" alt="Laravel Logo" class="rounded-full w-[50%] h-[30%] md:w-[20%] object-cover">
      <p class="text-5xl font-semibold text-center mt-5"> Full Stack Zen </p>
          <p class="text-xl my-5 text-[#CECBF6]/75 text-center font-semibold">Performance Summary</p>
          <hr class="w-[75%] mb-5 md:mb-0 md:w-[90%] border-t-2 border-white/25">
     </div>
  </div>

    <!--Summary Display-->
  <div class=" w-full md:w-[75%] flex flex-col md:flex-row md:justify-evenly items-center">
    <div class="border-2 text-[#CECBF6] rounded-2xl w-[45%] md:w-[20%] h-40 flex flex-col justify-center items-center border-[#CECBF6]/15 bg-[#CECBF6]/6">
      <x-heroicon-m-trophy class="w-13 h-13 p-2 text-yellow-500" />
      <p class="text-2xl font-semibold">Level 5</p>
      <p class="text-md">Problem Solver</p>
    </div>

    <div class="border-2 text-[#CECBF6] rounded-2xl my-10 w-[45%] md:w-[20%] h-40 flex flex-col justify-center items-center border-[#CECBF6]/15 bg-[#CECBF6]/6">
      <x-heroicon-m-fire class="w-13 h-13 p-2 text-red-500" />
      <p class="text-2xl font-semibold">8</p>
      <p class="text-md">Day Streak</p>
    </div>
    
    <div class="border-2 text-[#CECBF6] rounded-2xl w-[45%] md:w-[20%] h-40 flex flex-col justify-center items-center border-[#CECBF6]/15 bg-[#CECBF6]/6">
      <x-heroicon-m-star class="w-13 h-13 p-2 text-orange-300" />
      <p class="text-2xl font-semibold">500</p>
      <p class="text-md">XP</p>
    </div>
  </div>
  <hr class="w-[75%] my-6 md:my-0 md:w-[90%] border-t-2 border-white/25">
  <p class="text-xl md:my-5 text-[#CECBF6]/75 text-center font-semibold">Your Subjects</p>

  <!--Progress Display-->
  <div class="text-white w-full md:w-[75%] flex flex-col justify-center items-center gap-5 mt-2 p-5">
    <div class="w-full flex flex-col md:flex-row md:justify-evenly gap-10 justify-center items-center">

      <div class=" flex flex-col border-2 rounded-2xl w-[80%] md:w-[45%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
        <div class="flex justify-between items-center w-full p-2">
          <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
          <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
        </div>
        <div class="my-1 p-2">
            <p class="text-md font-semibold text-[#CECBF6]">Discrete Mathematics</p>
            <p class="text-xs text-[#CECBF6]/75">8 quizzes available</p>
            <div class="flex justify-evenly items-center mt-2">
                <div class=" flex flex-row items-center w-full gap-1 pt-2">
                    <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                    <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                </div>
            </div>
        </div>
      </div>

      <div class=" flex flex-col border-2 rounded-2xl w-[80%] md:w-[45%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
        <div class="flex justify-between items-center w-full p-2">
          <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
          <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
        </div>
        <div class="my-1 p-2">
            <p class="text-md font-semibold text-[#CECBF6]">Computer Programming 1</p>
            <p class="text-xs text-[#CECBF6]/75">8 quizzes available</p>
            <div class="flex justify-evenly items-center mt-2">
                <div class=" flex flex-row items-center w-full gap-1 pt-2">
                    <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                    <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                </div>
            </div>
        </div>
      </div>

      <div class=" flex flex-col border-2 rounded-2xl w-[80%] md:w-[45%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
        <div class="flex justify-between items-center w-full p-2">
          <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
          <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
        </div>
        <div class="my-1 p-2">
            <p class="text-md font-semibold text-[#CECBF6]">Computer Programming 2</p>
            <p class="text-xs text-[#CECBF6]/75">8 quizzes available</p>
            <div class="flex justify-evenly items-center mt-2">
                <div class=" flex flex-row items-center w-full gap-1 pt-2">
                    <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                    <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                </div>
            </div>
        </div>
      </div>

      <div class=" flex flex-col border-2 rounded-2xl w-[80%] md:w-[45%] border-[#CECBF6]/15 bg-[#CECBF6]/6">
        <div class="flex justify-between items-center w-full p-2">
          <x-heroicon-o-inbox-arrow-down class="w-8 h-8 text-green-500" />
          <x-progress-circle :percent="75" :size="40" :stroke-width="4" />
        </div>
        <div class="my-1 p-2">
            <p class="text-md font-semibold text-[#CECBF6]">Data Structure and Algorithm</p>
            <p class="text-xs text-[#CECBF6]/75">8 quizzes available</p>
            <div class="flex justify-evenly items-center mt-2">
                <div class=" flex flex-row items-center w-full gap-1 pt-2">
                    <button class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">View quizzes</button>
                    <button class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Review</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <hr class="w-[75%] my-6 md:mt-7 md:w-[90%] border-t-2 border-white/25">
  <p class="text-xl mt-1 md:my-5 text-[#CECBF6]/75 text-center font-semibold">Leaderboard</p>
  
  <div class="flex flex-row justify-center items-center w-full md:w-full mt-2 p-5">

    <div class="text-[#CECBF6] flex flex-col items-center justify-center">
        <x-heroicon-m-star class="w-13 h-13 p-2 text-gray-300" />
        <img src="{{ Vite::asset('resources/images/dp.jpeg') }}" alt="Laravel Logo" class="rounded-full w-[40%] h-[30%] md:w-[30%] object-cover">
        <p class="text-lg font-semibold mt-5 text-[#CECBF6]">John Doe</p>
        <p class="text-md font-semibold text-[#CECBF6]/75">950 XP</p>
    </div>

    <div class="text-[#CECBF6] flex flex-col justify-center items-center">
        <x-heroicon-m-star class="w-14 h-14 mb-1 text-orange-300" />
        <img src="{{ Vite::asset('resources/images/dp.jpeg') }}" alt="Laravel Logo" class="rounded-full w-[70%] h-[30%] object-cover">
        <p class="text-lg md:text-4xl font-semibold mt-5 text-[#CECBF6]">Full Stack Zen</p>
        <p class="text-md font-semibold text-[#CECBF6]/75">5,000 XP</p>
        </div>

    <div class="text-[#CECBF6] flex flex-col justify-center items-center">
        <x-heroicon-m-star class="w-13 h-13 p-2 text-yellow-600" />
        <img src="{{ Vite::asset('resources/images/dp.jpeg') }}" alt="Laravel Logo" class="rounded-full w-[40%] h-[30%] md:w-[30%] object-cover">
        <p class="text-lg font-semibold mt-5 text-[#CECBF6]">Dela Cruz</p>
        <p class="text-md font-semibold text-[#CECBF6]/75">500 XP</p>
    </div>
  </div>

  <div class="w-[80%] h-auto md:w-[60%] text-[#CECBF6] flex flex-row border-2 rounded-lg border-[#CECBF6]/15 bg-[#CECBF6]/6">

    <div class=" w-[50%] flex flex-col mt-2 items-center">
        <p class="md:text-xl text-lg">Student</p>

        <div class="flex flex-row justify-center items-center gap-2 mt-2 md:mt-5">
            <p class="text-lg font-semibold md:text-2xl">John Doe</p>
        </div>

        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <p class="text-lg font-semibold md:text-2xl">Juan Ponce</p>
        </div>

        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <p class="text-lg font-semibold md:text-2xl">Dela Cruz</p>
        </div>
    </div>

    <div class=" w-[50%] flex flex-col mt-2 items-center">
        <p class="md:text-xl text-lg">XP</p>

        <div class="flex flex-row justify-center items-center gap-2 mt-2 md:mt-5">
            <p class="text-lg font-semibold md:text-2xl">100 XP</p>
        </div>

        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <p class="text-lg font-semibold md:text-2xl ">50 XP</p>
        </div>

        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <p class="text-lg font-semibold md:text-2xl ">25 XP</p>
            </div>

    </div>

    <div class=" w-[50%] flex flex-col mt-2 items-center">
        <p class="md:text-xl text-lg">Rank</p>
        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <p class="text-lg font-semibold md:text-2xl">Martial</p>
        </div>

        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <p class="text-lg font-semibold md:text-2xl">Apprentice</p>
        </div>

        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <p class="text-lg font-semibold md:text-2xl">Novice</p>
            </div>

    </div>
    

    
  </div>

  
</main>
    </body>
</html>