<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Products extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function productimage()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }

    protected $table = 'products';
}
