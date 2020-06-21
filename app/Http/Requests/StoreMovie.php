<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovie extends FormRequest
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
            'name'=>"required|max:50",
            'director'=>"required|max:50",
            'year'=>'required|numeric|max:'.date('Y').'',
            'genre'=>'required|alpha|max:50',
            'quantity'=>'numeric|required',
            'price'=>'numeric|required',
            'image'=>'required|file|image|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'image'      => 'La foto de portada es obligatoria y tiene que ser un formato de imagen valido: jpg, png, etc',
        ];
    }
}
