<div>
    <div class="grid 2xl:grid-cols-4 grid-cols-2 gap-4">
        <div class="bg-white p-5 rounded-xl border flex justify-between items-center">
            <h1 class="font-bold 2xl:text-xl  uppercase text-green-600">Requests</h1>
            <h1 class="font-bold 2xl:text-xl  uppercase text-gray-600">{{ $requests }}</h1>
        </div>
        <div class="bg-white p-5 rounded-xl border flex justify-between items-center">
            <h1 class="font-bold 2xl:text-xl uppercase text-green-600">Approved</h1>
            <h1 class="font-bold 2xl:text-xl uppercase text-gray-600">{{ $approved }}</h1>
        </div>
    </div>
    <div class="mt-5">
        {{ $this->table }}
    </div>
</div>
