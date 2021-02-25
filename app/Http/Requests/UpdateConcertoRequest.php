<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConcertoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'status' => 'required'
        ];
    }

    public function messages()
    {

        return[
            'required' => 'O campo :attribute é obrigatório.',
            
        ];
    }
}
