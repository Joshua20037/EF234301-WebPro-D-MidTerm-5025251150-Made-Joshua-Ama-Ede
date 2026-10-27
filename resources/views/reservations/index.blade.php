<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Riwayat Reservasi</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <a href="{{ route('reservations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block mb-4">+ Buat Reservasi</a>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border-b p-2">Pelanggan</th>
                            <th class="border-b p-2">Nomor Meja</th>
                            <th class="border-b p-2">Waktu</th>
                            <th class="border-b p-2">Status</th>
                            <th class="border-b p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $res)
                        <tr>
                            <td class="border-b p-2">{{ $res->user->name }}</td>
                            <td class="border-b p-2">Meja {{ $res->table->table_number }}</td>
                            <td class="border-b p-2">{{ $res->reservation_time }}</td>
                            <td class="border-b p-2 capitalize">{{ $res->status }}</td>
                            <td class="border-b p-2">
                                <a href="{{ route('reservations.edit', $res->id) }}" class="text-yellow-600 mr-2">Edit</a>
                                <form action="{{ route('reservations.destroy', $res->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Batalkan dan hapus reservasi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-4 text-gray-500">Belum ada reservasi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>