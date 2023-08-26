<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typephone extends Model
{
    protected $table = "typephone";

    public function phone(){
        return $this->hasMany('App\Models\Phone');
    }
}


