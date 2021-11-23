<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Layar extends Model
{
    public function layars()
    {
        return url("/layar/{$this->id}-" . Str::slug($this->name));
    }
}
