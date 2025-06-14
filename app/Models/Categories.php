<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name',
        'image',
    ];

    public function product()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
