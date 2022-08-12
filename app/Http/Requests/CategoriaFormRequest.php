<?php

namespace App\Http\Requests;


use App\Models\Categoria;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
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
            'nombre'=>'required|max:64',
            'descripcion'=>'max:256',
            'precio'=>'required|numeric',
            'id_itinerario'=>'required|integer',
            'id_lugar'=>'required|integer',
        ];
    }
}
