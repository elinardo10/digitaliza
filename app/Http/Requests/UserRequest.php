<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
Use App\User;


class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ];
    }

     public function messages(){

        return[
        'required' => 'O campo :attribute não pode ser vazio!',
        'name.required' => 'O usuário precisa de um nome!',
        'name.max' => 'você ultrapassou os 255 caracteres permitidos',
        'password.required' => 'Digite sua senha',
        'role.required' => 'Qual Papel do usuário no sistema?',
        
        ];
    }
}
