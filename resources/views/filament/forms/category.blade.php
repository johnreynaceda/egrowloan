<div class="block w-full overflow-x-auto mb-5">
    <table class="items-center bg-transparent w-full border-collapse ">
        <thead>
            <tr>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    CATEGORY NAME
                </th>

                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    ACTIONS
                </th>
            </tr>
        </thead>

        <tbody>
            @forelse ($this->categories as $item)
                <tr>
                    <th
                        class="border px-6 uppercase align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                        {{ $item->name }}
                    </th>

                    <td class="border px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        <div class="flex space-x-2 items-end text-red-500 hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7h16" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                <path d="M10 12l4 4m0 -4l-4 4" />
                            </svg>
                            <span class=" text-sm font-medium">delete</span>
                        </div>
                    </td>
                </tr>
            @empty
                <td class="border px-2" colspan="2">
                    <span class="text-center text-sm">No Category...</span>
                </td>
            @endforelse

        </tbody>

    </table>
