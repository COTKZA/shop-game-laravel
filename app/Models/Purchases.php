<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    public $timestamps = false;

    protected $table = 'purchases';

    protected $fillable = [
        'user_id',
        'product_details_id',
        'price',
    ];
}
