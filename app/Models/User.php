<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'telefone',
        'cep',
        'cnpj',
        'tituloeleitor',
        'logradouro',
        'complemento',
        'bairro',
        'localidade',
        'uf',
        'tipo',
        'regiao',
        'cnes',
        'registrocc',
        'modalidade',
    ];

    static $rules =[
        'name'=>'required',
        'email' =>'required|unique:users',
        'cpf' =>'required|unique:users',
        'tipo'=>'required|',
        'cep'=>'required|',
        'modalidade'=>'required|',
    ];
    static $rulesUpdade =[
        'name'=>'required',
        'cpf' =>'required',
        'tipo'=>'required|',
        'cep'=>'required|',
        'modalidade'=>'required|',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function arquivos(){
    return $this->hasMany('App\Models\Arquivo','user_id');
    }

    public function voto(){
        return $this->belongsTo('App\Models\Voto','canditato_id');
    }
}
