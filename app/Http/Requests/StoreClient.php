<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules() 
    {
        return [           
                'name' => 'required|string',
                'lastname' => 'required|string',
                'age' => 'required|numeric',
                'email' => 'required|email|unique:clients',
                'tel' => 'required|integer|unique:clients'  
        ];
    }
}
