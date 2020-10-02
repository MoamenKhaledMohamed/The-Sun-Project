<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    public function donations(){

        return $this->hasMany('App\Models\Donation');
    
    }

    public function events(){
        
        return $this->belongsToMany('App\Models\Event');
    
    }
}
