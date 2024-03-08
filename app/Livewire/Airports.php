<?php

// app/Livewire/Airports.php

namespace App\Livewire;

use App\Models\Airport;
use Livewire\Component;

class Airports extends Component
{
    public $selectedAirportId;
    public $airports;
    public $name;
    public $search = '';

    public function mount()
    {
        // Fetch all airports from the database
        $this->airports = Airport::all();
    }

    public function render()
    {
        $filteredAirports = $this->search
            ? Airport::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('city', 'like', '%' . $this->search . '%')
            ->get()
            : $this->airports;

        return view('livewire.airports', ['filteredAirports' => $filteredAirports]);
    }
}
