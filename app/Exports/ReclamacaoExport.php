<?php

namespace App\Exports;

use App\Reclamacao;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReclamacaoExport implements FromCollection
{
   protected $dateStart;
   protected $dateEnd;

   public function __construct($dateStart , $dateEnd)
   {
        $this->dateStart = $dateStart->format('Y/m/d');
        $this->dateEnd = $dateEnd->format('Y/m/d');
        
   }
    public function collection()
    {
        $reclamacoes =  Reclamacao::select('nome','email', 'cep','rua','bairro','cidade','numero','obs','status','agendado');

        if($this->dateStart != '')
        {
            
           $reclamacoes = $reclamacoes->where("created_at",'>=', $this->dateStart);
            
        }
        if($this->dateEnd != '')
        {
            
            $reclamacoes = $reclamacoes->where("created_at",'<=',$this->dateEnd);
            
        }
        return $reclamacoes->get();  
    }
}
