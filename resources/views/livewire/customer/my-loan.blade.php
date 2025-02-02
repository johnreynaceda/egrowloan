<div>
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
                                12
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
                        <x-button label="PAY NOW" squared positive class="font-medium" />
                        <x-button label="VIEW RECORD" squared warning class="font-medium" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
