<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Admin Kafe</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-6">Selamat datang, {{ Auth::user()->name }}! Apa yang ingin anda lakukan hari ini?</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('menus.index') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition text-center shadow-sm">
                        <span class="text-blue-700 font-bold text-lg">Kelola Menu</span>
                    </a>
                    <a href="{{ route('tables.index') }}" class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition text-center shadow-sm">
                        <span class="text-green-700 font-bold text-lg">Kelola Meja</span>
                    </a>
                    <a href="{{ route('reservations.index') }}" class="block p-6 bg-orange-50 border border-orange-200 rounded-lg hover:bg-orange-100 transition text-center shadow-sm">
                        <span class="text-orange-700 font-bold text-lg">Kelola Reservasi</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>