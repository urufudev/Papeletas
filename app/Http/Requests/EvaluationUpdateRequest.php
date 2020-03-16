<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationUpdateRequest extends FormRequest
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
            'user_id' =>'required',
            'resp_status' =>'required',
            'resp_chdate'=>'required',
            'resp_msg'=>'required',
            'resp_name'=>'required',
            
        ];
    }
    
    public function messages()
    {
    return [
    
        'resp_status.required' =>'SELECCIONE UN ESTADO PARA LA PAPELETA',
        'resp_msg.required' => 'EL CAMPO - MENSAJE DE RESPONSABLE - ES OBLIGATORIO',
        'resp_chdate.required' => 'LA FECHA DE EVALUACION ES OBLIGATORIA',
        
    ];
    }
}
