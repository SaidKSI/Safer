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
}
