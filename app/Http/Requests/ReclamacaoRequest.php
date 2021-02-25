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
            'email' => ['required','email'],
            'cep' => ['required', 'min:8','max:10'],
            'rua'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'numero'=>['required','min:1','numeric'],
            'observacao' => 'required'
        ];
    }
    public function messages()
    {
        return [
        'required' => ' O campo :attribute é obrigatorio',
        'min' => 'O campo :attribute deve possuir no minimo :min caracteres',
        'max' => 'O campo :attribute deve possuir no maximo :max caracteres',
        'numeric' => 'O campo :attribute deve conter apenas valores númericos.',
        
        ];
    }
   // public function attribute()
   // {
    //    return [
     //       'name' => 'nome',
      //  ];
   // }
}
