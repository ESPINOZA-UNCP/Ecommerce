<?php

namespace App\Http\Requests;


use App\Models\Pago;
use Illuminate\Foundation\Http\FormRequest;

class PagoFormRequest extends FormRequest
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
            'monto'=>'required|numeric',
            'tipo_pago'=>'required|max:64',
            'cantidad'=>'required|numeric',
        ];
    }
}
