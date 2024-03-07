<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'Sb_name',
        'profile_picture',
        'instruction_image',
        'instruction_pdf',
        'prefix',
        'shortTransaction',
        'can_send',
        'can_receive',
        'send_account',
        'transaction_name',
        'transaction_name_ar',
        'num_of_characters',
        'only_digit',
    ];
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
