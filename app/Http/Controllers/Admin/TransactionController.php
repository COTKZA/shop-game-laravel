<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletTransactions;
use App\Models\Wallets;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = WalletTransactions::with('wallet.user');

        if ($search) {
            $query->whereHas('wallet.user', function ($q) use ($search) {
                $q->where('email', 'like', "%$search%");
            });
        }

        $wallet_transaction =  $query->paginate(10);

        return view('admin.wallet_transaction', compact(['wallet_transaction']));
    }

    public function approve_wallet($id)
    {
        $wallet_transaction = WalletTransactions::findOrFail($id);

        if ($wallet_transaction->payment_state === 'success')
        {
            return back()->with('error', 'รายการนี้มีการเติมเงินเข้าบีญชีไปเเล้ว');
        }

        if ($wallet_transaction->payment_state === 'expired')
        {
            return back()->with('error', 'รายการนี้ยอดเงินไม่ถูกต้องหรือมีข้อผิดพลาด');
        }

        $wallet_id = $wallet_transaction->wallet;

        $wallet_transaction->update([
            'payment_state' => 'success',
        ]);

        $wallet_id->balance += $wallet_transaction->amount;
        $wallet_id->save();

        return back()->with('success', 'เติมเงินสำเร็จ');
    }

    public function reject_wallet($id)
    {
       $wallet_transaction = WalletTransactions::findOrFail($id);

       $wallet_transaction->update([
            'payment_state' => 'expired',
       ]);

       return back()->with('success', 'ไม่อนุมัติการเติมเงินเรียบร้อย');
    }
}
