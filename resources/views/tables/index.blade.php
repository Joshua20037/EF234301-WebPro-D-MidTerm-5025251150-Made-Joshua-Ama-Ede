<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Daftar Meja Kafe') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('tables.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block mb-4">+ Tambah Meja</a>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border-b p-2">Nomor Meja</th>
                            <th class="border-b p-2">Kapasitas (Orang)</th>
                            <th class="border-b p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tables as $table)
                        <tr>
                            <td class="border-b p-2">Meja {{ $table->table_number }}</td>
                            <td class="border-b p-2">{{ $table->capacity }} Orang</td>
                            <td class="border-b p-2">
                                <a href="{{ route('tables.edit', $table->id) }}" class="text-yellow-600 mr-2">Edit</a>
                                <form action="{{ route('tables.destroy', $table->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Hapus meja ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="text-center py-4 text-gray-500">Belum ada meja.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>