<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    public function category()
    {
        return $this->hasMany('App\Category','id');
    }
    public function categories()
    {
        return url("/category/{$this->id}-" . Str::slug($this->name));
    }
}
