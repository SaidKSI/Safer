<?php

namespace App\Livewire;

use Livewire\Component;

class Airport extends Component
{
    public $airports;

    public function mount()
    {
        // Fetch all airports from the database
        $this->airports = Airport::all();
    }

    public function render()
    {
        return view('livewire.airport');
    }
}
