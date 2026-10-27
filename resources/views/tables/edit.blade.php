<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Meja</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('tables.update', $table->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700">Nomor Meja</label>
                        <input type="number" name="table_number" value="{{ $table->table_number }}" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Kapasitas Kursi</label>
                        <input type="number" name="capacity" value="{{ $table->capacity }}" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui</button>
                    <a href="{{ route('tables.index') }}" class="ml-4 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>