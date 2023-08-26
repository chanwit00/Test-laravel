<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phone";

    public function typephone(){
        return $this->belongsTo('App\Models\Typephone');
    }
}


