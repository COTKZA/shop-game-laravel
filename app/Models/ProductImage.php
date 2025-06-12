<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    protected $table = 'product_images';
}
