<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('status', '!=', 'hold')->get();

        return view('transaction.history', ['transactions' => $transactions]);
    }
}
