<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public function events()
    {
        return $this->belongsToMany('App\Models\Event', 'donor_events');
    }
    public function donations()
    {
        return $this->belongsTo('App\Models\Donation');
    }

}
