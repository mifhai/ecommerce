<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    public function brands()
    {
        return $this->hasMany('App\Brand','id');
    }
    public function brand()
    {
        return url("/brands/{$this->id}-" . Str::slug($this->brand_name));
    }
}
