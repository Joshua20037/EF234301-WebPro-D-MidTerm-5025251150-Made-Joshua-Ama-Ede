<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Reservasi</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700">Pilih Meja</label>
                        <select name="table_id" class="w-full border-gray-300 rounded-md" required>
                            @foreach($tables as $table)
                                <option value="{{ $table->id }}" {{ $reservation->table_id == $table->id ? 'selected' : '' }}>
                                    Meja {{ $table->table_number }} (Kapasitas: {{ $table->capacity }} Orang)
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Waktu Reservasi</label>
                        <input type="datetime-local" name="reservation_time" value="{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('Y-m-d\TH:i') }}" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Status Reservasi</label>
                        <select name="status" class="w-full border-gray-300 rounded-md" required>
                            <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $reservation->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="completed" {{ $reservation->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui Reservasi</button>
                    <a href="{{ route('reservations.index') }}" class="ml-4 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>