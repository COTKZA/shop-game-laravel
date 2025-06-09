<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\WalletTransactions;
use App\Models\Wallets;

class WalletTransactionController extends Controller
{
    public function add_truemoney(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'truemoney_gifts' => 'required',
        ]);

        $user = Auth::user();

        $wallet = $user->wallet;

        if (!$wallet)
        {
            $wallet = Wallets::create([
                'user_id' => $user->id,
                'balance' => 0,
            ]);
        }

        $refCode = Str::upper(Str::random(15));

        WalletTransactions::create([
            'wallet_id' => $wallet->id,
            'amount' => $request->amount,
            'truemoney_gifts' => $request->truemoney_gifts,
            'payment_slip' => null,
            'payment_state' => 'pending',
            'transaction_type' => 'truemoney',
            'ref_code' => $refCode,
        ]);

        return back()->with('success', 'รอการตรวจสอบการโอนเงิน');
    }

    public function add_payment(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'payment_slip' => 'required',
        ]);

        $user = Auth::user();

        $wallet = $user->wallet;

        if(!$wallet)
        {
            $wallet = Wallets::create([
                'user_id' => $user->id,
                'balance' => 0,
            ]);
        }

        $refCode = Str::upper(Str::random(15));

        if ($request->hasFile('payment_slip')) {
            $imageFile = $request->file('payment_slip');
            $imageData = file_get_contents($imageFile);
            $base64Image = base64_encode($imageData);

            WalletTransactions::create([
                'wallet_id' => $wallet->id,
                'amount' => $request->amount,
                'truemoney_gifts' => null,
                'payment_slip' => $base64Image,
                'payment_state' => 'pending',
                'transaction_type' => 'payment',
                'ref_code' => $refCode,
            ]);

            return back()->with('success', 'รอการตรวจสอบการโอนเงิน');
        }

        return back()->with('error', 'ไม่พบสลิปการชำระเงิน');
    }
}
