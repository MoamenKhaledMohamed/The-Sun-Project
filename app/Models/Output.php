<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

     public function needy(){

        return $this->belongsTo('App\Models\Needy');
    
    }

}
