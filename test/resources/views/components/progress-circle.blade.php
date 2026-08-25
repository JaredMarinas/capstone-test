@props([
    'percent' => 0,
    'size' => 80,
    'strokeWidth' => 8,
])

@php
    // Cast to floats to prevent errors if passed as raw strings (e.g. percent="62")
    $percent = max(0, min(100, (float) $percent));
    $size = (float) $size;
    $strokeWidth = (float) $strokeWidth;

    // Calculate SVG geometry
    $radius = ($size - $strokeWidth) / 2;
    $circumference = 2 * pi() * $radius;
    $offset = $circumference - ($percent / 100) * $circumference;
@endphp

<div {{ $attributes->merge(['class' => 'relative inline-flex items-center justify-center']) }} style="width: {{ $size }}px; height: {{ $size }}px;">
    <svg class="w-full h-full -rotate-90 transform overflow-visible" viewBox="0 0 {{ $size }} {{ $size }}">
        <!-- Background Track Circle -->
        <circle
            cx="{{ $size / 2 }}"
            cy="{{ $size / 2 }}"
            r="{{ $radius }}"
            stroke="currentColor"
            stroke-width="{{ $strokeWidth }}"
            class="text-purple-950/60"
            fill="transparent"
        />
        
        <!-- Animated Progress Circle -->
        <circle
            cx="{{ $size / 2 }}"
            cy="{{ $size / 2 }}"
            r="{{ $radius }}"
            stroke="currentColor"
            stroke-width="{{ $strokeWidth }}"
            stroke-dasharray="{{ round($circumference, 2) }}"
            stroke-dashoffset="{{ round($offset, 2) }}"
            stroke-linecap="round"
            class="text-purple-300 transition-all duration-500 ease-out"
            fill="transparent"
        />
    </svg>

    <!-- Center Label -->
    <span class="absolute text-[10px] font-semibold text-purple-200">
        {{ (int) $percent }}%
    </span>
</div>