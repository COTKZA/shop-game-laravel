<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bans extends Model
{
    protected $fillable = [
        'user_id',
        'reason',
        'user_status',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public $timestamps = false;
}
