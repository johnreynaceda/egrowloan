<div>
    <div class="space-y-3 py-5">
        @forelse ($menus as $item)
            <div>
                <h1 class="font-bold text-xl uppercase text-gray-600">{{ $item->name }}</h1>
                <div class="grid grid-cols-2 mt-2 2xl:gap-5 gap-2">
                    @foreach (\App\Models\Menu::where('category_id', $item->id)->get() as $menu)
                        <div wire:click="showOrderModal({{ $menu->id }})"
                            class="bg-white hover:bg-gray-100 shadow rounded-xl p-5">
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
                                <p class="uppercase font-semibold">{{ $menu->name }}</p>
                                <span
                                    class="text-gray-700 font-medium">&#8369;{{ number_format($menu->amount, 2) }}</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @empty
        @endforelse
    </div>

    <x-modal name="simpleModal" wire:model.defer="order_modal">
        <x-card title="{{ strtoupper($menuss->name ?? '') }}">
            <div class="w-[23rem]">
                <div class="bg-white hover:bg-gray-100  rounded-xl p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 text-green-600" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-paper-bag">
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

            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-button flat label="Cancel" negative x-on:click="close" />

                <x-button positive right-icon="shopping-cart" class="font-medium" label="Add to cart"
                    wire:click="addToCart" spinner="addToCart" />
            </x-slot>
        </x-card>
    </x-modal>
</div>
