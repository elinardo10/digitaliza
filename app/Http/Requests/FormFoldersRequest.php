<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormFoldersRequest extends FormRequest
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

       'pasta' => 'required|min:3'
       ];
   }

   public function messages(){

    return[
    'required' => 'O campo :attribute não pode ser vazio!',
    'pasta.required' => 'A pasta precisa de um nome!',
    'pasta.min' => 'Nome da pasta não pode ter menos de 3 caracteres'
    ];
}
}
