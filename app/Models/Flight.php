<?php

// app/Models/Flight.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'airline_id',
        'airport_from_id',
        'airport_to_id',
        'price',
        'departure_time',
        // Add other fillable attributes as needed
    ];

    // Define relationships if needed
    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function airportFrom()
    {
        return $this->belongsTo(Airport::class, 'airport_from_id');
    }

    public function airportTo()
    {
        return $this->belongsTo(Airport::class, 'airport_to_id');
    }
}

