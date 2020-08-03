<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicioRequest extends FormRequest
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
            'nombre' =>'required',
            'descripcion' =>'required', 
            'importe' =>'required', 
            'tipo_servicio' =>'required', 
            'estado' =>'required', 
            'user_id' =>'required', 
            'categoria_id' =>'required', 
            'habilidad_id' =>'required',
        ];
    }
}
