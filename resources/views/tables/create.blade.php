<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Meja') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('tables.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Nomor Meja</label>
                        <input type="number" name="table_number" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Kapasitas Kursi</label>
                        <input type="number" name="capacity" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>