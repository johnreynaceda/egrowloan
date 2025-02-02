<div>
    <div class="bg-white p-10">
        <div class="mb-10">
            <div class="border-b">

            </div>
            <div class="mt-5">
                <h1 class="text-xl">Sales Income Report</h1>
            </div>
            <div class="mt-10">
                <table id="example" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">CUSTOMER NAME</th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                DATE
                            </th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                ORDER NUMBER
                            </th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                ORDERS
                            </th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                TOTAL AMOUNT
                            </th>

                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($saless as $item)
                            <tr>
                                <td class="border-2  text-gray-700  px-3 py-1">{{ $item->user->name ?? 'WalkIn' }}</td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</td>
                                <td class="border-2  text-gray-700  px-3 py-1">{{ $item->order_number }}</td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    <div>
                                        @foreach (\App\Models\Order::where('transaction_id', $item->id)->get() as $order)
                                            <div>{{ $order->menu->name }} x {{ $order->quantity }}</div>
                                        @endforeach

                                    </div>
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    &#8369;{{ number_format($item->total_amount, 2) }}</td>

                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td colspan="3" class="border-2  text-gray-700  px-3 py-1"></td>
                            <td class="border-2  text-gray-700 text-right font-bold px-3 py-1">TOTAL</td>
                            <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                                &#8369;{{ number_format($saless->sum('total_amount'), 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <x-button label="Print Sales" class="" slate icon="printer" />
    </div>
</div>
