<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $fillable = [
        'product_id',
        'username',
        'email',
        'password',
        'is_sold',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    protected $table = 'product_details';

}
