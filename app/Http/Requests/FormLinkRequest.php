<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormLinkRequest extends FormRequest
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

       'name' => 'required|min:3',
       'link' => 'required|min:3',
       'slug' => 'required|min:3',
       'user_id' => 'required',
       'pasta_id' => 'required',
       'subpasta_id' => 'required',
       ];
   }

   public function messages(){

    return[
    'required' => 'O campo :attribute não pode ser vazio!',
    'name.required' => 'O arquivo precisa de um nome!',
    'name.min' => 'Nome do arquivo não pode ter menos de 3 caracteres',
    'link.required' => 'Por favor insira o link do arquivo.',
    'slug.required' => 'Por favor insira o link do arquivo.',
    'user_id.required' => 'Por favor, Selecione um usuário!',
    'pasta_id.required' => 'Por favor, Selecione uma pasta!',
    'subpasta_id.required' => 'Por favor, Selecione um ano',
    ];
}
}
