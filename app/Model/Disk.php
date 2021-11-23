<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Disk extends Model
{
    public function storage()
    {
        return url("/storage/{$this->id}-" . Str::slug($this->name));
    }
}
