<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductPromotion extends Model
{
    protected $fillable = [
        'promotion_id',
        'product_name',
        'images',
        'price',
        'diskon',
        'persen',
        'stok'
    ];
    public function product()
    {
        return url("/product/{$this->product_id}-" . Str::slug($this->product_name));
    }
}
