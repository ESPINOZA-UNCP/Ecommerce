<?php

namespace App\Http\Requests;


use App\Models\Itinerario;
use Illuminate\Foundation\Http\FormRequest;

class ItinerarioFormRequest extends FormRequest
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
            'origen'=>'required|max:128',
            'destino'=>'required|max:128',
            'fecha_salida'=>'required|date',
            'fecha_llegada'=>'required|date',
        ];
    }
}
