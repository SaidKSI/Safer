<?php

// app/Models/Transaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_id',
        'user_id',
        'bank_id',
        'transaction_id',
        'action_date',
        'phone_number',
        'status'
        // Add other fillable attributes as needed
    ];

    // Define relationships if needed
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
