<div x-data="{ open: false, cart: false }">
    <div
        class="flex flex-col w-full bg-white px-8 py-3 mx-auto md:px-12 md:items-center md:justify-between md:flex-row  max-w-7xl">
        <div class="flex flex-row items-center justify-between text-black">
            <a class="inline-flex items-center gap-3 text-xl font-bold tracking-tight text-black" href="/">
                <h1 class="font-kanit text-xl font-semibold underline text-yellow-500">e<span
                        class="text-green-600 font-bold">GROWLOANS</span>
                </h1>
            </a>

            <div class="space-x-5 flex items-end">
                <div @click="cart = true" class="relative cursor-pointer hover:scale-95 2xl:hidden block">
                    <div class="absolute -top-1 -right-2" positive>
                        <div class="px-1  pt-[0.1rem] text-sm rounded-md font-medium text-white bg-green-600">
                            {{ $cart->count() }}</div>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="text-"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-basket">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                            <path d="M17 10l-2 -6" />
                            <path d="M7 10l2 -6" />
                        </svg>
                    </div>
                </div>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="flex-col items-center flex-grow hidden gap-3 p-4 px-5 text-sm relative font-medium text-gray-500 md:px-0 md:pb-0 md:flex md:justify-start md:flex-row lg:p-0 md:mt-0">
            {{-- <a class="hover:text-black focus:outline-none focus:text-gray-500 " href="#_">Home
                    </a>
                    <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto"
                        href="#_">Transaction
                    </a> --}}
            <div class="md:ml-auto md:mr-20 2xl:block  flex flex-col space-x-4 items-center">
                <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto" href="#_">Home
                </a>


                @if (auth()->user()->member)
                    <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto"
                        href="{{ route('customer.loans') }}">My Loan
                    </a>
                @endif
                <a class="hover:text-green-500 py-2 focus:outline-none focus:text-gray-500 md:mr-auto"
                    href="{{ route('customer.transactions') }}">Transactionss
                </a>
                <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto" href="#_">Profile
                </a>
            </div>
            <div class="md:ml-auto md:mr-20 hidden flex  space-x-4 items-center">
                <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto" href="#_">Home
                </a>
                @if (auth()->user()->member)
                    <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto"
                        href="{{ route('customer.loans') }}">My Loan
                    </a>
                @endif
                <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto"
                    href="{{ route('customer.transactions') }}">Transaction
                </a>
                <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto" href="#_">Profile
                </a>
            </div>
            <div x-data="{
                dropdownOpen: false
            }" class="relative flex space-x-3 items-center">
                <div @click="cart = true" class="relative mr-4 cursor-pointer hover:scale-95 2xl:block hidden ">
                    <div class="absolute -top-1 -right-2" positive>
                        <div class="px-1  pt-[0.1rem] text-sm rounded-md font-medium text-white bg-green-600">
                            {{ $cart->count() }}</div>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="text-"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-basket">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                            <path d="M17 10l-2 -6" />
                            <path d="M7 10l2 -6" />
                        </svg>
                    </div>
                </div>

                <button @click="dropdownOpen=true"
                    class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                    <img src="https://cdn.devdojo.com/images/may2023/adam.jpeg"
                        class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                    <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                        <span>{{ auth()->user()->name }}</span>
                        <span class="text-xs font-light text-neutral-400">{{ auth()->user()->email }}</span>
                    </span>
                    <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>
                </button>

                <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="ease-out duration-200"
                    x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0"
                    class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                    <div class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                        <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                        <a href="#_"
                            class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Profile</span>
                            <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                        </a>

                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg>
                                <span>Log out</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>

        </nav>


    </div>



    <div x-show="cart" x-cloak class="relative z-10" aria-labelledby="slide-over-title" role="dialog"
        aria-modal="true">
        <!--
      Background backdrop, show/hide based on slide-over state.

      Entering: "ease-in-out duration-500"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in-out duration-500"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <div x-show="cart" x-cloak x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            aria-hidden="true"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <!--
            Slide-over panel, show/hide based on slide-over state.

            Entering: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-full"
              To: "translate-x-0"
            Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-0"
              To: "translate-x-full"
          -->
                    <div x-show="cart" x-cloak
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="etransform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                        class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">My Cart</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" @click="cart = false"
                                            class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            @php
                                                $subtotal = 0;
                                            @endphp
                                            @forelse ($cart as $item)
                                                @php
                                                    $itemTotal = $item->menu->amount * $item->quantity;
                                                    $subtotal += $itemTotal;
                                                @endphp
                                                <li class="flex py-2">
                                                    <div
                                                        class="h-24 w-24 flex-shrink-0 overflow-hidden grid place-content-center rounded-md border border-gray-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-20 text-green-600" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888a5 5 0 0 1 .528 2.236v5.82a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-5.82a5 5 0 0 1 .528 -2.236l1.472 -2.944v-3a2 2 0 0 1 2 -2z" />
                                                            <path d="M14 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path
                                                                d="M6 21a2 2 0 0 0 2 -2v-5.82a5 5 0 0 0 -.528 -2.236l-1.472 -2.944" />
                                                            <path d="M11 7h2" />
                                                        </svg>
                                                    </div>

                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div
                                                                class="flex justify-between text-base font-medium text-gray-900">
                                                                <h3>
                                                                    <a href="#">{{ $item->menu->name }}</a>
                                                                </h3>
                                                                <p class="ml-4">
                                                                    &#8369;{{ number_format($itemTotal, 2) }}</p>
                                                            </div>
                                                            <p class="mt-1 text-sm text-gray-500">
                                                                {{ $item->menu->category->name }}</p>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                            <p class="text-gray-500">Qty {{ $item->quantity }}</p>

                                                            <div class="flex">
                                                                <button type="button"
                                                                    wire:click="removeToCart({{ $item->id }})"
                                                                    class="font-medium text-red-600 hover:text-red-500">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="text-gray-500 text-center">Your cart is empty.</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>&#8369;{{ number_format($subtotal, 2) }}</p>
                                </div>
                                <div class="mt-6">
                                    <div wire:click="checkout({{ $subtotal }})"
                                        class="flex items-center space-x-2 justify-center rounded-md border border-transparent bg-green-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-green-700">
                                        <span>Checkout</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" wire:loading wire:target="checkout"
                                            width="24" class="animate-spin" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-loader">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 6l0 -3" />
                                            <path d="M16.25 7.75l2.15 -2.15" />
                                            <path d="M18 12l3 0" />
                                            <path d="M16.25 16.25l2.15 2.15" />
                                            <path d="M12 18l0 3" />
                                            <path d="M7.75 16.25l-2.15 2.15" />
                                            <path d="M6 12l-3 0" />
                                            <path d="M7.75 7.75l-2.15 -2.15" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or
                                        <button type="button" @click="cart = false"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Continue Shopping <span aria-hidden="true">&rarr;</span>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
