<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    public function needyes()
    {
        return $this->belongsTo('App\Models\Neddy');


    }
}
