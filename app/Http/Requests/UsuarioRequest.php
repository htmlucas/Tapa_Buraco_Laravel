<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => ['required','email','unique:usuarios,email'],
            'password' => ['required','min:6', 'max:10','confirmed'],
            'tipo_usuario' => 'required'
        ];
    }

    public function attributes()  
    {
        return[
            'password' => 'senha'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'Informe um e-mail válido',
            'unique' => 'Já existe este :attribute cadastrado',
            'min' => 'O campo :attribute deve possuir no minimo :min caracteres',
            'max' => 'O campo :attribute deve possuir no maximo :max caracteres',
            'confirmed' => 'A confirmação do campo :attribute não é valida'

        ];



    }
}
