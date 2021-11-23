<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Processor extends Model
{
    public function processors()
    {
        return url("/processor/{$this->id}-" . Str::slug($this->name));
    }
}
