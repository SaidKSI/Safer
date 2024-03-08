<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'user_id' => 'required|exists:users,id',
            'bank_id' => 'required|exists:banks,id',
            'transaction_id' => 'required',
            // Add other validation rules as needed
        ]);
    
        // If phone_number is not provided, retrieve it from the user
        $phone_number = $request->input('phone_number') ?: User::find($request->input('user_id'))->phone_number;
    
        $bank = Bank::find($request->input('bank_id'));
    
        if (!$bank) {
            return response()->json(['error' => 'Bank not found'], 404);
        }
    
        $data = array_merge($request->all(), ['phone_number' => $phone_number]);
    
        $transaction = Transaction::create($data);
    
        return response()->json(['message' => 'Transaction added successfully', 'data' => $transaction, 'bank' => $bank], 201);
    }
}
