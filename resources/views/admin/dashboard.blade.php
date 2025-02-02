@section('title', 'Dashboard')
<x-admin-layout>
    <div class="grid grod-cols-1 2xl:grid-cols-4 gap-5">
        <div class="bg-white p-5 rounded-xl shadow-lg">
            <h1 class="text-3xl text-green-700 font-bold">{{ \App\Models\Member::count() }}</h1>
            <h1 class="text-gray-700">Members</h1>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-lg">
            <h1 class="text-3xl text-green-700 font-bold">{{ \App\Models\Menu::count() }}</h1>
            <h1 class="text-gray-700">Menus</h1>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-lg">
            <h1 class="text-3xl text-green-700 font-bold">{{ \App\Models\User::count() }}</h1>
            <h1 class="text-gray-700">Users</h1>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-lg">
            <h1 class="text-3xl text-green-700 font-bold">
                &#8369;{{ number_format(\App\Models\Loan::where('status', 'approved')->sum('amount'), 2) }}</h1>
            <h1 class="text-gray-700">Loans</h1>
        </div>
    </div>
</x-admin-layout>
