<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Auth extends FormRequest
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

        $rules = [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ];

        // login
        if ($this->path() === 'api/login') {
            return $rules;
        }


        // register
        $rules['email']   .= '|unique:users';
        $rules['first_name'] = 'required|min:10|max:35';
        $rules['last_name']  = 'required|min:10|max:30';
        $rules['photo']   = 'required';
        $rules['role']   = 'required';
        $rules['position']   = ['required','max:30'];

        return $rules;
    }





}
