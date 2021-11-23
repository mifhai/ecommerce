<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name_product',
        'brands',
        'category_product',
        'processor',
        'storage',
        'layar',
        'short_desc',
        'description',
        'price',
        'diskon',
        'image',
        'sku',
        'berat',
        'stok',
        'status',
        'recomended',
        'preorder'
    ];


    public function attributes()
    {
        return $this->hasMany('App\ProductsImage','product_id');
    }
    public function category()
    {
        return $this->hasMany('App\Category','id');
    }

    public function product()
    {
        return url("/product/{$this->id}-" . Str::slug($this->name_product));
    }
}
