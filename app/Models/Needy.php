<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Needy extends Model
{
    public function outputs()
    {
        return $this->hasMany('App\Models\Output');
    }
    use HasFactory;
}
