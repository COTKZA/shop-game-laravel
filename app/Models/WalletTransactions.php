<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletTransactions extends Model
{
    protected $fillable = [
        'wallet_id',
        'amount',
        'payment_slip',
        'truemoney_gifts',
        'payment_state',
        'transaction_type',
        'ref_code',
    ];

    protected $table = 'wallet_transactions';

    public function wallet()
    {
        return $this->belongsTo(Wallets::class, 'wallet_id', 'id');
    }
}
