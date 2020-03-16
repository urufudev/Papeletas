<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeUpdateRequest extends FormRequest
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
            'name' =>'required',
            'slug'=>'required|unique:offices,slug,' .$this->office,
            
        ];
    }

    public function messages()
    {
    return [
    
        'name.required' =>'EL CAMPO NOMBRE ES OBLIGATORIO',
        'slug.required' => 'EL CAMPO SLUG ES REQUERIDO',
        
    ];
    }
}
