<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    
    public function canditato(){
        return $this->belongsTo('App\Models\User','canditato_id');
    }
}
