<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallets extends Model
{
    protected $fillable = [
        'user_id',
        'balance',
    ];

    public $timestamps = false;

    protected $table = 'wallets';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
