@props(['type' => 'info', 'dismissable' => true])

@php
    $typeClasses = [
        'success' => [
            'bg' => 'bg-emerald-50',
            'border' => 'border-emerald-200',
            'text' => 'text-emerald-800',
            'icon' => 'text-emerald-600',
            'close' => 'text-emerald-600 hover:text-emerald-800'
        ],
        'error' => [
            'bg' => 'bg-red-50',
            'border' => 'border-red-200',
            'text' => 'text-red-800',
            'icon' => 'text-red-600',
            'close' => 'text-red-600 hover:text-red-800'
        ],
        'warning' => [
            'bg' => 'bg-amber-50',
            'border' => 'border-amber-200',
            'text' => 'text-amber-800',
            'icon' => 'text-amber-600',
            'close' => 'text-amber-600 hover:text-amber-800'
        ],
        'info' => [
            'bg' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'text' => 'text-blue-800',
            'icon' => 'text-blue-600',
            'close' => 'text-blue-600 hover:text-blue-800'
        ]
    ];

    $colors = $typeClasses[$type] ?? $typeClasses['info'];
@endphp

<div 
    x-data="{ show: true }" 
    x-show="show" 
    x-init="setTimeout(() => show = false, 5000)"
    x-transition:leave="transition ease-in duration-300"
    :class="show ? 'opacity-100' : 'opacity-0 pointer-events-none'"
    class="{{ $colors['bg'] }} {{ $colors['border'] }} {{ $colors['text'] }} rounded-lg border px-4 py-4 shadow-sm flex items-start gap-3"
    {{ $attributes }}
>
    <!-- Icon -->
    <div class="flex-shrink-0 mt-0.5">
        @if ($type === 'success')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 {{ $colors['icon'] }}">
                <path fill-rule="evenodd" d="M2.25 12c0-6.215 5.034-11.25 11.25-11.25s11.25 5.035 11.25 11.25S19.715 23.25 12 23.25 2.25 18.215 2.25 12zm13.5-1.5a.75.75 0 10-1.5-1.5l-4.5 4.5-2.25-2.25a.75.75 0 10-1.06 1.061l2.81 2.81a.75.75 0 001.06 0l5.25-5.25z" clip-rule="evenodd" />
            </svg>
        @elseif ($type === 'error')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 {{ $colors['icon'] }}">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
        @elseif ($type === 'warning')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 {{ $colors['icon'] }}">
                <path fill-rule="evenodd" d="M9.401 3.003c1.492-2.004 4.716-2.004 6.208 0l5.585 7.48c1.491 2.004.753 4.970-1.640 4.970H5.116c-2.393 0-3.131-2.966-1.640-4.97L9.401 3.003zM12 8.25a.75.75 0 01.75.75v3a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 {{ $colors['icon'] }}">
                <path fill-rule="evenodd" d="M2.25 12c0-6.215 5.034-11.25 11.25-11.25s11.25 5.035 11.25 11.25S19.715 23.25 12 23.25 2.25 18.215 2.25 12zm8.25-3.75a.75.75 0 100 1.5A2.25 2.25 0 0113.5 15a.75.75 0 001.5 0A3.75 3.75 0 0012 11.25z" clip-rule="evenodd" />
            </svg>
        @endif
    </div>

    <!-- Content -->
    <div class="flex-1">
        <p class="text-sm font-medium">{{ $slot }}</p>
    </div>

    <!-- Close Button -->
    @if ($dismissable)
        <button 
            type="button" 
            @click="show = false"
            class="{{ $colors['close'] }} transition-colors flex-shrink-0"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 11-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    @endif
</div>
