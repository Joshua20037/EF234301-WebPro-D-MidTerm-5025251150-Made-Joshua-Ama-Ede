<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Reservasi Baru</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Pilih Meja</label>
                        <select name="table_id" class="w-full border-gray-300 rounded-md" required>
                            <option value="">-- Pilih Meja --</option>
                            @foreach($tables as $table)
                                <option value="{{ $table->id }}">Meja {{ $table->table_number }} (Kapasitas: {{ $table->capacity }} Orang)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Waktu Reservasi</label>
                        <input type="datetime-local" name="reservation_time" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Konfirmasi Reservasi</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>