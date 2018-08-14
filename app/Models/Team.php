<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    public function drivers(){
        return $this->hasMany('App\Models\Driver');
    }
}
