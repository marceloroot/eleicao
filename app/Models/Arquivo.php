<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;
    protected $fillable = ['nome','caminho','descricao','user_id'];
    static $rules =[
        'nome'=>'required',
        'caminho'=>'required',
        
        
    ];


    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
        }
}
