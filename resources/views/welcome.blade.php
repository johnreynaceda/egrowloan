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

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased overflow-hidden">
    <div class="bg-white mobile 2xl:hidden">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <h1 class="">
                            <h1 class="font-kanit text-xl font-semibold underline text-yellow-500">e<span
                                    class="text-green-600 font-bold">GROWLOANS</span>
                            </h1>
                        </h1>
                    </a>
                </div>



            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->

        </header>

        <div class="relative isolate  px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(80%-11rem)] aspect-[1155/678] w-[40.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#f5f106] to-[#1b9125] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="fixed bg-gray-200 border p-10 rounded-t-[3rem] shadow-2xl left-0 bottom-0 right-0 ">
                <x-shared.utensils class="absolute -top-[12.3rem] left-0 right-0" />
                <div class="grid place-content-center">

                    <h1 class="text-xl  uppercase text-center font-kanit font-bold text-green-600 ">Where
                        Convenience
                        Meets
                        Simplicity</h1>
                    <p class="text-center text-sm pt-3">Experience the perfect blend of convenience and simplicity with
                        Simplified
                        Shopping Hubs.</p>

                    <div class="mt-14">
                        <button class="bg-white flex w-full p-1 px-2 justify-between items-center rounded-full">
                            <span class="text-gray-600 pl-2">Get Started</span>
                            <a href="{{ route('login') }}"
                                class="bg-gray-700 grid place-content-center text-white  w-10 h-10 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M13 18l6 -6" />
                                    <path d="M13 6l6 6" />
                                </svg>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>
    <div class="2xl:block hidden ">

        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(80%-11rem)] aspect-[1155/678] w-[40.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#f5f106] to-[#1b9125] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <section>
            <div class="px-8 py-64 mx-auto md:px-12 lg:px-32 max-w-7xl relative">
                <x-shared.utensils class="absolute top-20 opacity-15 left-0 right-0" />
                <div class="relative">
                    <h1 class="font-kanit text-xl font-semibold underline text-yellow-500">e<span
                            class="text-green-600 font-bold">GROWLOANS</span>
                    </h1>
                    <h1
                        class="text-4xl mt-5 font-semibold font-kanit tracking-tighter text-green-600 lg:text-6xl text-balance">
                        Where Convenience
                        Meets
                        Simplicity
                    </h1>
                    <p class="mt-4 text-base font-medium text-gray-500 text-balance">
                        Experience the perfect blend of convenience and simplicity with
                        Simplified
                        Shopping Hubs.
                    </p>
                    <div class="flex flex-col items-center gap-2 mx-auto mt-8 md:flex-row">
                        <button
                            class="inline-flex items-center justify-center w-full h-12 space-x-5 px-1 py-3 border font-medium duration-200 bg-white md:w-auto rounded-full hover:bg-gray-100 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                            aria-label="Primary action">
                            <span class="px-10 text-gray-600">Get Started</span>
                            <a href="{{ route('login') }}"
                                class="bg-gray-700 hover:bg-green-700 grid place-content-center text-white  w-10 h-10 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M13 18l6 -6" />
                                    <path d="M13 6l6 6" />
                                </svg>
                            </a>
                        </button>

                    </div>
                </div>
            </div>
        </section>


    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
