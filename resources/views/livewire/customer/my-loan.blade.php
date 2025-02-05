<div x-data="{ modalOpen: false }">
    <div class="2xl:grid-cols-7 grid-cols-1 grid gap-5">
        <div class="2xl:col-span-4">
            {{ $this->table }}
        </div>
        <div class="2xl:col-span-3">
            <div class="border border-green-500 rounded-xl p-2 ">
                <div class="bg-white rounded-lg p-5">
                    <div class="flex space-x-2 text-gray-600 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-wallet">
                            <path
                                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1" />
                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4" />
                        </svg>
                        <h1 class="font-bold text-main">Active Loan</h1>
                    </div>
                    @if ($loan)
                        <div class="mt-5 flex justify-between items-center">
                            @php
                                $monthly_interest = $loan->amount * 0.05;
                                $total_interest = $monthly_interest * 12;
                                $monthly_payment = $loan->amount / 12;
                            @endphp
                            <div>
                                <h1 class="text-xl uppercase text-gray-700 font-bold">

                                    &#8369;{{ number_format($loan->amount + $total_interest, 2) }}</h1>
                                <h1 class="text-xs text-gray-500 leading-3">Total payment with 5% per month.</h1>
                            </div>
                            <div class="">
                                <div class=" p-4 rounded-xl font-bold text-gray-700 bg-gray-100">
                                    {{ 12 - $payments }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <h1 class="font-bold text-green-700 text-sm">PAYMENT THIS MONTH</h1>
                            <div class="mt-3">
                                <h1 class="text-xl uppercase text-gray-700 font-bold">
                                    &#8369;{{ number_format($monthly_payment + $monthly_interest, 2) }}</h1>
                                <h1 class="text-xs text-gray-500 leading-3">Monthly payment with 5% interest</h1>
                            </div>
                        </div>
                        <div class="mt-5 flex space-x-3">
                            <x-button label="PAY NOW" squared positive class="font-medium" @click="modalOpen=true" />
                            <x-button label="VIEW RECORD" squared warning class="font-medium"
                                href="{{ route('customer.view-record', ['id' => $loan->id]) }}" />
                        </div>
                    @else
                        <div class="grid mt-10 place-content-center">
                            <x-shared.loan class="2xl:h-40 h-20" />
                            <div class="span text-center mt-5 text-gray-500">No Active Loan!</div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>


    <div @keydown.escape.window="modalOpen = false" class="relative z-50 w-auto h-auto">

        <template x-teleport="body" wire:ignore>
            <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                x-cloak>
                <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false"
                    class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full py-6 bg-white pb-10 px-7 sm:max-w-lg sm:rounded-lg">
                    <div class="flex items-center justify-between pb-2">
                        <h3 class="text-lg font-semibold">PAYMENT INFO</h3>
                        <button @click="modalOpen=false"
                            class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="relative w-auto">
                        @if ($loan)
                            <div>
                                <div class="mt-10  pb-2 border-b">
                                    <h1 class="font-bold text-green-700 text-sm">PAYMENT THIS MONTH</h1>
                                    <div class="mt-3">
                                        <h1 class="text-xl uppercase text-gray-700 font-bold">
                                            &#8369;{{ number_format($monthly_payment + $monthly_interest, 2) }}</h1>
                                        <h1 class="text-xs text-gray-500 leading-3">Monthly payment with 5% interest
                                        </h1>
                                    </div>
                                </div>
                                <div class="border mt-5 rounded-lg p-5">
                                    {{ $this->form }}
                                </div>
                            </div>
                        @endif
                        <div class="flex justify-end space-x-3 mt-5 items-center  py-3">
                            <x-button label="Cancel" @click="modalOpen=false" slate squared outline />
                            <x-button label="Submit Payment" squared positive
                                wire:click="payNow({{ $monthly_payment + $monthly_interest }})" />
                        </div>
                    </div>

                </div>
            </div>
        </template>
    </div>
</div>
