<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-gray-100">

    <x-shared.utensils class="fixed top-20 h-full  w-full opacity-10 " />
    <div x-data="{ sidebar: false }" class="">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <livewire:navigation />

        <div
            class="sticky top-0 z-40 flex items-center gap-x-6 bg-gradient-to-bl from-green-100 via-white to-white px-4 py-4 shadow-sm sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-500 lg:hidden" x-on:click="sidebar = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <div class="flex-1 text-sm font-bold leading-6 text-green-600">@yield('title')</div>
            <a href="#">
                <span class="sr-only">Your profile</span>
                <img class="h-8 w-8 rounded-full bg-indigo-700"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
            </a>
        </div>

        <main class="py-10 lg:pl-72  ">
            <div class="px-4 sm:px-6 lg:px-20 ">
                <h1 class="text-3xl hidden 2xl:block font-semibold text-green-600">@yield('title')</h1>
                <div class="2xl:mt-10 relative">
                    {{ $slot }}
                </div>

            </div>
        </main>
    </div>
    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
