<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Menu</label>
                        <input type="text" name="name" value="{{ $menu->name }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm">{{ $menu->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ $menu->price }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui Menu</button>
                    <a href="{{ route('menus.index') }}" class="ml-4 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>