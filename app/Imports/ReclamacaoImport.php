<?php

namespace App\Imports;

use App\Reclamacao;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReclamacaoImport implements ToModel , WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Reclamacao([
            'nome'=>$row['nome'],
            'email'=>$row['email'],
            'cep'=>$row['cep'],
            'rua'=>$row['rua'],
            'bairro'=>$row['bairro'],
            'cidade'=>$row['cidade'],
            'numero'=>$row['numero'],
            'obs'=>$row['obs'],
            'status'=>$row['status'],
            'agendado'=>$row['agendado']
        ]);
    }
}
