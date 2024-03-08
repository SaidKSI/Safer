<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use Illuminate\Http\Request;

class AirController extends Controller
{
    public function airlines()
    {
        $airlines = Airline::get();

        return view('airline', ['airlines' => $airlines]);
    }
    public function airports()
    {
        $airports = Airport::get();

        return view('airport', ['airports' => $airports]);
    }
    public function create_airline(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3',
            // Add other validation rules as needed
        ]);


            $airline = Airline::create([
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                // Add other attributes as needed
            ]);

            // Emit success event
            return redirect()->route('airlines')->with('success', 'Airline created successfully.');
    }

    public function create_airport(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);
    
        $code = strtoupper(substr($request->input('city'), 0, 3)) . random_int(100, 999);
        
        $airport = Airport::create([
            'name' => $request->input('name'),
            'city' => $request->input('city'),
            'code' => $code,
            // Add other attributes as needed
        ]);
        return redirect()->route('airports')->with('success', 'Airport created successfully.');
    }

    public function delete_airport($id)
    {
        $airport = Airport::find($id);
    
        if ($airport) {
            $airport->delete();
    
            // Show success message
            return redirect('/admin/airports')->with(['type'=>'success','message' => 'Airport Deleted successfully'], 201);
        } else {
            // Show error message
            return  redirect('/admin/airports')->with(['type'=>'danger','message' => 'Error'], 403);
        }
    }
    public function delete_airline($id)
    {
        $airline = Airline::find($id);

        if ($airline) {
            $airline->delete();

            // Show success message
            $this->dispatchBrowserEvent('show-alert', [
                'type' => 'success',
                'message' => 'Airline deleted successfully!',
            ]);
        } else {
            // Show error message
            $this->dispatchBrowserEvent('show-alert', [
                'type' => 'error',
                'message' => 'Airline not found!',
            ]);
        }
    }
}
