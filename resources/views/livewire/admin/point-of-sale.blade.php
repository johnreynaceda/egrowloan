<div x-data="{ modalIsOpen: @entangle('order_modal') }">
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-4">
            <div>
                <h1 class="font-semibold text-green-700">Orders:</h1>
                <div class="mt-3 h-40 rounded-xl">
                    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="10"
                        slides-per-view="3" free-mode="true">
                        @forelse ($orders as $item)
                            <swiper-slide wire:ignore>
                                <div class="border-2 bg-white/80 rounded-xl p-5 h-40">
                                    <div class="flex justify-between items-end">
                                        <h1 class="italic text-gray-600">Order# : {{ $item->order_number }}</h1>
                                        <x-badge label="Pending" rounded warning flat />
                                    </div>
                                    <div>
                                        <h1 class="mt-2 text-sm">Name: {{ $item->user->name ?? 'Walk-In' }}</h1>
                                        <h1 class="mt-1 text-sm">Total Amount:
                                            &#8369;{{ number_format($item->total_amount, 2) }}</h1>
                                    </div>
                                    <div class="mt-3">
                                        <x-button label="View" slate class="w-full font-semibold"
                                            wire:click="viewOrder({{ $item->id }})" right-icon="arrow-right" />
                                    </div>
                                </div>
                            </swiper-slide>
                        @empty
                            <div>
                                No Orders Available...
                            </div>
                        @endforelse

                    </swiper-container>
                </div>
            </div>
            <div class="my-5">
                <hr class="border-2 border-green-700">
            </div>
            <div>
                <h1 class="text-2xl font-bold text-green-700">MENU</h1>
                <div class="mt-5">
                    <div class="flex space-x-3 items-center">
                        <x-button slate flat class="font-semibold" label="All"
                            wire:click="$set('active_cat', null)" />
                        @foreach ($categories as $cat)
                            <x-button slate flat class="font-semibold"
                                wire:click="$set('active_cat', {{ $cat->id }})" label="{{ $cat->name }}" />
                        @endforeach
                    </div>
                </div>
                <div class="mt-5 grid grid-cols-4 gap-5">
                    @forelse ($products as $prod)
                        <div wire:click="showOrderModal({{ $prod->id }})"
                            class="bg-white hover:bg-gray-100 cursor-pointer shadow rounded-xl p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 text-green-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-paper-bag">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888a5 5 0 0 1 .528 2.236v5.82a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-5.82a5 5 0 0 1 .528 -2.236l1.472 -2.944v-3a2 2 0 0 1 2 -2z" />
                                <path d="M14 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M6 21a2 2 0 0 0 2 -2v-5.82a5 5 0 0 0 -.528 -2.236l-1.472 -2.944" />
                                <path d="M11 7h2" />
                            </svg>
                            <div class="mt-2 text-sm ">
                                <p class="uppercase font-semibold">{{ $prod->name }}</p>
                                <span
                                    class="text-gray-700 font-medium">&#8369;{{ number_format($prod->amount, 2) }}</span>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <div class="bg-white p-5 px-7 py-8 shadow-lg">
                <div class="flex justify-between items-end border-b pb-2 text-gray-700">
                    <h1 class="text-lg">Prepared Orders</h1>
                    <div><svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                            <path d="M16 5l3 3" />
                        </svg></div>
                </div>
                <div class="h-96 mt-5">
                    <ul role="list" class="-my-6 divide-y divide-gray-200 mt-5">
                        @php
                            $subtotal = 0;
                        @endphp
                        @forelse ($transaction_id != null ? $cart : $carts as $item)
                            @php
                                $itemTotal = $item->menu->amount * $item->quantity;
                                $subtotal += $itemTotal;
                            @endphp
                            <li class="flex py-2 ">
                                <div
                                    class="h-24 w-24 flex-shrink-0 overflow-hidden grid place-content-center rounded-md border border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 text-green-600"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888a5 5 0 0 1 .528 2.236v5.82a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-5.82a5 5 0 0 1 .528 -2.236l1.472 -2.944v-3a2 2 0 0 1 2 -2z" />
                                        <path d="M14 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M6 21a2 2 0 0 0 2 -2v-5.82a5 5 0 0 0 -.528 -2.236l-1.472 -2.944" />
                                        <path d="M11 7h2" />
                                    </svg>
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <a href="#" class="uppercase">{{ $item->menu->name }}</a>
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
                                            <button type="button" wire:click="removeToCart(sd)"
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
                <div class="flex justify-between text-lg font-medium text-gray-900">
                    <p>Subtotal</p>
                    <p>&#8369;{{ number_format($subtotal, 2) }}</p>
                </div>
                <div class="mt-5">
                    <x-button label="PROCEED TO PAYMENT" slate lg class="w-full font-semibold" right-icon="arrow-right"
                        wire:click="proceedPayment({{ $subtotal }})"
                        spinner="proceedPayment({{ $subtotal }})" />
                </div>
            </div>
        </div>
    </div>
    <div>

        <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-sm sm:items-center lg:p-8"
            role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
            <!-- Modal Dialog -->
            <div x-show="modalIsOpen"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-2xl border border-slate-300 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                <!-- Dialog Header -->
                <div
                    class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 p-4 dark:border-slate-700 dark:bg-slate-900/20">
                    <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-black dark:text-white"></h3>
                    <button @click="modalIsOpen = false" aria-label="close modal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                            stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Dialog Body -->
                <div class="px-4 py-8">
                    <div class="w-[23rem]">
                        <div class="bg-white hover:bg-gray-100  rounded-xl p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 text-green-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-paper-bag">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888a5 5 0 0 1 .528 2.236v5.82a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-5.82a5 5 0 0 1 .528 -2.236l1.472 -2.944v-3a2 2 0 0 1 2 -2z" />
                                <path d="M14 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M6 21a2 2 0 0 0 2 -2v-5.82a5 5 0 0 0 -.528 -2.236l-1.472 -2.944" />
                                <path d="M11 7h2" />
                            </svg>
                            <div class="mt-2   ">
                                <p class="uppercase font-semibold">{{ $menuss->name ?? '' }}</p>
                                <span
                                    class="text-red-700 font-medium">&#8369;{{ number_format($menuss->amount ?? 0, 2) }}</span>
                            </div>
                        </div>
                        <div class="mt-3 px-5">
                            <x-number label="Quantity" wire:model.live="quantity" placeholder="0" />
                        </div>


                    </div>
                </div>
                <!-- Dialog Footer -->
                <div
                    class="flex flex-col-reverse justify-between gap-2 border-t border-slate-300 bg-slate-100/60 p-4 dark:border-slate-700 dark:bg-slate-900/20 sm:flex-row sm:items-center md:justify-end">
                    <x-button flat label="Cancel" negative x-on:click="close" />

                    <x-button positive right-icon="shopping-cart" class="font-medium" label="Add to cart"
                        wire:click="addToCart" spinner="addToCart" />
                </div>
            </div>
        </div>
    </div>
</div>
