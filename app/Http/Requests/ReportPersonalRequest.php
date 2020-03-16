<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportPersonalRequest extends FormRequest
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
            'f_from' =>'required',
            'f_to' =>'required',
        ];
    }
    public function messages()
    {
    return [
    
        'f_from.required' =>'EL CAMPO FECHA INICIO ES REQUERIDO',
        'f_to.required' => 'EL CAMPO FECHA FIN ES REQUERIDO',
        
    ];
    }
}
