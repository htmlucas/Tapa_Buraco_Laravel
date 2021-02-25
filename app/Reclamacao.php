<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamacao extends Model
{
    use SoftDeletes;
    
    protected $table = 'reclamacoes';

    protected $fillable = [
        'nome', 'email', 'cep','rua','bairro','observacao','status','agendado','created_at','id_usuario'
    ];

    public function usuario(){
        return $this->belongsTo('App\Usuario','id_usuario');
    }

    public function getAgendadoAttribute($value)
    {

        $divisor = explode("-", $value);

        // Inverte os pedaços
        $reverso = array_reverse($divisor);

        // Junta novamente a matriz em texto
        $final = implode("/", $reverso); // Junta com espaço

        return $final;
        


    }
}
