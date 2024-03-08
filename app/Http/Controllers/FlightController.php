<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::get();

        return view('flight', ['flights' => $flights]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'airline_id' => 'required|numeric',
            'airport_from_id' => 'required|numeric',
            'airport_to_id' => 'required|numeric',
            'price' => 'required|numeric|min:0',
            'departure_time' => 'required|date', // Validate for 24-hour time format
        ]);

        // Concatenate the current date with the provided time
        // $departureDateTime = Carbon::parse($request->input('departure_time'))->toDateString() . ' 00:00:00';

        Flight::create([
            'code' => $request->input('code'),
            'airline_id' => $request->input('airline_id'),
            'airport_from_id' => $request->input('airport_from_id'),
            'airport_to_id' => $request->input('airport_to_id'),
            'price' => $request->input('price'),
            'amount_before_tax' => $request->input('amount_before_tax'),
            'balance' => $request->input('balance'),
            'departure_time' => $request->input('departure_time'),
        ]);

        return redirect()->route('flights')->with('success', 'Flight created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $flight = Flight::find($id);

        if (!$flight) {
            return redirect()->route('flights')->with('error', 'Flight not found.');
        }

        $flight->delete();

        return redirect()->route('flights')->with('success', 'Flight deleted successfully.');
    }
}
