<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WalletTransactions;

class TopupHistoryController extends Controller
{
    public function index(){
        $user = Auth::user();

        $wallet = $user->wallet;

        $wallet_transaction = WalletTransactions::where('wallet_id', $wallet->id);

        $wallet_transaction_user = $wallet_transaction->paginate(10);

        return view('users.history.topup', compact(['wallet_transaction_user']));
    }
}
