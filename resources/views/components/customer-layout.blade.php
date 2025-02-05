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

    <div>
        <div class="justify-center w-full mx-auto bg-white ">
            <livewire:customer-navbar />

        </div>
        <div class="bg-white shadow border-b relative py-2">
            <div class="mx-auto max-w-7xl px-8">
                <nav class="text-sm font-medium text-slate-700 dark:text-slate-300" aria-label="breadcrumb">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li class="flex items-center text-gray-700 gap-2">
                            <a href="#" class="hover:text-black dark:hover:text-white">Home</a>
                            <span aria-hidden="true">/</span>
                        </li>

                        <li class="text-green-600 font-bold dark:text-white" aria-current="page">@yield('title')</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="mt-10 relative mx-auto max-w-7xl px-4">
            {{ $slot }}
        </div>

    </div>
    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
