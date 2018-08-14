<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

}
