<div>
    <div x-show="sidebar" x-cloak class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
        <!--
            Off-canvas menu backdrop, show/hide based on off-canvas menu state.

            Entering: "transition-opacity ease-linear duration-300"
              From: "opacity-0"
              To: "opacity-100"
            Leaving: "transition-opacity ease-linear duration-300"
              From: "opacity-100"
              To: "opacity-0"
          -->
        <div x-show="sidebar" x-cloak x-transitionL:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0 " x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 " class="fixed inset-0 bg-gray-900/80" aria-hidden="true"></div>

        <div class="fixed inset-0 flex">
            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div x-show="sidebar" x-cloak x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                class="relative mr-16 flex w-full max-w-xs flex-1">
                <!--
                Close button, show/hide based on off-canvas menu state.

                Entering: "ease-in-out duration-300"
                  From: "opacity-0"
                  To: "opacity-100"
                Leaving: "ease-in-out duration-300"
                  From: "opacity-100"
                  To: "opacity-0"
              -->
                <div x-show="sidebar" x-cloak x-transition:enter="ease-in-out duration-300"
                    x-transition:enter-start="opacity-0 " x-transition:enter-end="opacity-100 "
                    x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0 " class="absolute left-full top-0 flex w-16 justify-center pt-5">
                    <button x-on:click="sidebar=false" type="button" class="-m-2.5 p-2.5">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-2">
                    <div class="flex h-16 shrink-0 items-center">
                        <h1 class="font-kanit text-xl font-semibold underline text-yellow-500">e<span
                                class="text-green-600 font-bold">GROWLOANS</span>
                        </h1>
                    </div>
                    <nav class="flex flex-1 flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="-mx-2 space-y-1">
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="{{ request()->routeIs('admin.dashboard') ? 'bg-green-600 text-white' : 'text-green-600' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6  hover:bg-green-600 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M13.45 11.55l2.05 -2.05" />
                                                <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                                            </svg>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.members') }}"
                                            class="{{ request()->routeIs('admin.members') ? 'bg-green-600 text-white' : 'text-green-600' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6  hover:bg-green-600 hover:text-white"">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                            </svg>
                                            Members
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.menu') }}"
                                            class="{{ request()->routeIs('admin.menu') ? 'bg-green-600 text-white' : 'text-green-600' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6  hover:bg-green-600 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-paper-bag">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888a5 5 0 0 1 .528 2.236v5.82a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-5.82a5 5 0 0 1 .528 -2.236l1.472 -2.944v-3a2 2 0 0 1 2 -2z" />
                                                <path d="M14 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path
                                                    d="M6 21a2 2 0 0 0 2 -2v-5.82a5 5 0 0 0 -.528 -2.236l-1.472 -2.944" />
                                                <path d="M11 7h2" />
                                            </svg>
                                            Menus
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.loans') }}"
                                            class="{{ request()->routeIs('admin.loans') ? 'bg-green-600 text-white' : 'text-green-600' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6  hover:bg-green-600 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 21l18 0" />
                                                <path d="M3 10l18 0" />
                                                <path d="M5 6l7 -3l7 3" />
                                                <path d="M4 10l0 11" />
                                                <path d="M20 10l0 11" />
                                                <path d="M8 14l0 3" />
                                                <path d="M12 14l0 3" />
                                                <path d="M16 14l0 3" />
                                            </svg>
                                            Loans
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.loans') }}"
                                            class="{{ request()->routeIs('admin.loans') ? 'bg-green-600 text-white' : 'text-green-600' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6  hover:bg-green-600 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 21l18 0" />
                                                <path d="M3 10l18 0" />
                                                <path d="M5 6l7 -3l7 3" />
                                                <path d="M4 10l0 11" />
                                                <path d="M20 10l0 11" />
                                                <path d="M8 14l0 3" />
                                                <path d="M12 14l0 3" />
                                                <path d="M16 14l0 3" />
                                            </svg>
                                            POS
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        <ul class="mb-10">
                            <li>
                                <a href="#"
                                    class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-report-money">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                        <path
                                            d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                        <path d="M12 17v1m0 -8v1" />
                                    </svg>
                                    Sales
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users') }}"
                                    class="{{ request()->routeIs('admin.users') ? 'bg-green-600 text-white' : 'text-green-600' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6  hover:bg-green-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user-cog">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" />
                                        <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M19.001 15.5v1.5" />
                                        <path d="M19.001 21v1.5" />
                                        <path d="M22.032 17.25l-1.299 .75" />
                                        <path d="M17.27 20l-1.3 .75" />
                                        <path d="M15.97 17.25l1.3 .75" />
                                        <path d="M20.733 20l1.3 .75" />
                                    </svg>
                                    Users
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-red-600  hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                            <path d="M9 12h12l-3 -3" />
                                            <path d="M18 15l3 -3" />
                                        </svg>
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-10 lg:flex lg:w-72 bg-white  border-r lg:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex grow flex-col gap-y-5 overflow-y-auto px-6">
            <div class="flex h-16 shrink-0 items-center">
                <h1 class="font-kanit text-xl font-semibold underline text-yellow-500">e<span
                        class="text-green-600 font-bold">GROWLOANS</span>
                </h1>
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class=" {{ request()->routeIs('admin.dashboard') ? 'bg-green-600 text-white' : '' }}  group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M13.45 11.55l2.05 -2.05" />
                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.members') }}"
                                    class="{{ request()->routeIs('admin.members') ? 'bg-green-600 text-white' : '' }}  group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                    Members
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.menu') }}"
                                    class=" {{ request()->routeIs('admin.menu') ? 'bg-green-600 text-white' : '' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-paper-bag">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888a5 5 0 0 1 .528 2.236v5.82a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-5.82a5 5 0 0 1 .528 -2.236l1.472 -2.944v-3a2 2 0 0 1 2 -2z" />
                                        <path d="M14 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M6 21a2 2 0 0 0 2 -2v-5.82a5 5 0 0 0 -.528 -2.236l-1.472 -2.944" />
                                        <path d="M11 7h2" />
                                    </svg>
                                    Menus
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.loans') }}"
                                    class="{{ request()->routeIs('admin.loans') ? 'bg-green-600 text-white' : '' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21l18 0" />
                                        <path d="M3 10l18 0" />
                                        <path d="M5 6l7 -3l7 3" />
                                        <path d="M4 10l0 11" />
                                        <path d="M20 10l0 11" />
                                        <path d="M8 14l0 3" />
                                        <path d="M12 14l0 3" />
                                        <path d="M16 14l0 3" />
                                    </svg>
                                    Loans
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pos') }}"
                                    class="{{ request()->routeIs('admin.pos') ? 'bg-green-600 text-white' : '' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-cash-register">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M21 15h-2.5c-.398 0 -.779 .158 -1.061 .439c-.281 .281 -.439 .663 -.439 1.061c0 .398 .158 .779 .439 1.061c.281 .281 .663 .439 1.061 .439h1c.398 0 .779 .158 1.061 .439c.281 .281 .439 .663 .439 1.061c0 .398 -.158 .779 -.439 1.061c-.281 .281 -.663 .439 -1.061 .439h-2.5" />
                                        <path d="M19 21v1m0 -8v1" />
                                        <path
                                            d="M13 21h-7c-.53 0 -1.039 -.211 -1.414 -.586c-.375 -.375 -.586 -.884 -.586 -1.414v-10c0 -.53 .211 -1.039 .586 -1.414c.375 -.375 .884 -.586 1.414 -.586h2m12 3.12v-1.12c0 -.53 -.211 -1.039 -.586 -1.414c-.375 -.375 -.884 -.586 -1.414 -.586h-2" />
                                        <path
                                            d="M16 10v-6c0 -.53 -.211 -1.039 -.586 -1.414c-.375 -.375 -.884 -.586 -1.414 -.586h-4c-.53 0 -1.039 .211 -1.414 .586c-.375 .375 -.586 .884 -.586 1.414v6m8 0h-8m8 0h1m-9 0h-1" />
                                        <path d="M8 14v.01" />
                                        <path d="M8 17v.01" />
                                        <path d="M12 13.99v.01" />
                                        <path d="M12 17v.01" />
                                    </svg>
                                    POS
                                </a>
                            </li>


                        </ul>
                    </li>

                </ul>
                <ul class="mb-10 space-y-2">
                    <li>
                        <a href="{{ route('admin.sales') }}"
                            class="{{ request()->routeIs('admin.sales') ? 'bg-green-600 text-white' : '' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report-money">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path
                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                <path d="M12 17v1m0 -8v1" />
                            </svg>
                            Sales
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}"
                            class="{{ request()->routeIs('admin.users') ? 'bg-green-600 text-white' : '' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-green-600 hover:bg-green-600 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-user-cog">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" />
                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19.001 15.5v1.5" />
                                <path d="M19.001 21v1.5" />
                                <path d="M22.032 17.25l-1.299 .75" />
                                <path d="M17.27 20l-1.3 .75" />
                                <path d="M15.97 17.25l1.3 .75" />
                                <path d="M20.733 20l1.3 .75" />
                            </svg>
                            Users
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-red-600 hover:bg-red-400 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                    <path d="M9 12h12l-3 -3" />
                                    <path d="M18 15l3 -3" />
                                </svg>
                                Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
