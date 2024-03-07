<?php

namespace App\Livewire;

use App\Models\Airline;
use Livewire\Component;

class Airlines extends Component
{
    public $airlines;

    public function mount()
    {
        // Fetch all airlines from the database
        $this->airlines = Airline::all();
    }

    public function render()
    {
        return view('livewire.airlines');
    }
}
