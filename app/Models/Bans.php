<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bans extends Model
{
    protected $fillable = [
        'user_id',
        'reason',
    ];

    public $timestamps = false;
}
