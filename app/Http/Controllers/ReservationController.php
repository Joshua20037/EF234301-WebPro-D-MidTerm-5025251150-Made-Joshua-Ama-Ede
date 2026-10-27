<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'table'])->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::all();
        return view('reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'reservation_time' => 'required|date',
        ]);

        Reservation::create([
            'user_id' => Auth::id(), // Otomatis terisi dengan ID akun yang sedang login
            'table_id' => $request->table_id,
            'reservation_time' => $request->reservation_time,
            'status' => 'pending',
        ]);

        return redirect()->route('reservations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::all();
        return view('reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'reservation_time' => 'required|date',
            'status' => 'required|in:pending,approved,completed,cancelled',
        ]);

        $reservation->update([
            'table_id' => $request->table_id,
            'reservation_time' => $request->reservation_time,
            'status' => $request->status,
        ]);

        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
