<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReclamacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required',
            'cep' => 'required',
            'rua'=>'required',
            'bairro'=>'required',
            'observacao' => 'required'
        ];
    }
    public function messages()
    {
        return [
        'required' => ' O campo :attribute é obrigatorio'
        ];
    }
   // public function attribute()
   // {
    //    return [
     //       'name' => 'nome',
      //  ];
   // }
}
