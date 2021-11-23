<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Promotion extends Model
{
    // protected $dates = ['date_start', 'date_finish'];

    public function promotion()
    {
        return url("/promotions/{$this->id}-" . Str::slug($this->title));
    }
}
