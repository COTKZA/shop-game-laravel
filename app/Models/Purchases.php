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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product_details()
    {
        return $this->belongsTo(ProductDetails::class, 'product_details_id', 'id');
    }
}
