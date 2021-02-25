<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'agendado' => ['required','date'],
            'id_funcionario'=>'required'
        ];
    }
    public function attributes()
    {
        return [
            'id_funcionario' => 'Funcionario responsável',
            'agendado' => 'Data de Agendamento'

        ];
    }

    public function messages()
    {

        return[
            'required' => 'O campo :attribute é obrigatório.',
            'date' => 'Informe uma data válida',
        ];
    }
}
