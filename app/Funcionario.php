<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "employees";
    protected $fillable = [
        'name',
        'role'
    ];
}
