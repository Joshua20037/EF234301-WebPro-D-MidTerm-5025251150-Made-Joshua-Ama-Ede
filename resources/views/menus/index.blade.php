<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Menu Kafe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <a href="{{ route('menus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block mb-4">
                    + Tambah Menu Baru
                </a>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border-b p-2">Nama Menu</th>
                            <th class="border-b p-2">Deskripsi</th>
                            <th class="border-b p-2">Harga</th>
                            <th class="border-b p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                        <tr>
                            <td class="border-b p-2">{{ $menu->name }}</td>
                            <td class="border-b p-2">{{ $menu->description }}</td>
                            <td class="border-b p-2">Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                            <td class="border-b p-2">
                                <a href="{{ route('menus.edit', $menu->id) }}" class="text-yellow-600 mr-2">Edit</a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada menu yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>