<?php

namespace App\Http\Requests;


use App\Models\Venta;
use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
            'id_usuario'=>'required|integer',
            'id_pago'=>'required|integer',
            'id_paquete'=>'required|integer',
            'descripcion'=>'max:256',
        ];
    }
}
