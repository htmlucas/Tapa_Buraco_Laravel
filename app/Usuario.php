<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class Usuario extends Authenticatable
{
    protected $fillable= [
        'nome',
        'email',
        'password',
        'tipo_usuario'

    ];

    protected $hidden = [
        'password'
    ];

    //Mutator (manipulação no momento da atribuicao de um valor no atributo em questão)
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    //acessor
    public function getNomeAttribute($value)
    {   
        $nomeLowercase = strtolower($value);
        $nomeUppercase = ucfirst($nomeLowercase);

        return $nomeUppercase;


    }

    public function reclamacoes(){
        return $this->hasMany('App\Reclamacao');
    }
}
