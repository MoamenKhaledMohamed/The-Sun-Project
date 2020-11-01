<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Donor extends FormRequest
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
            "email"           => "required",
            "types.*.type"    => "required|string",
            "types.*.amount"    => "required|integer"

        ];

        if ($this->path() === 'api/donor/create2') {
            return $rules;
        }

        $rules ["first_name"] = "required | string";
        $rules ["last_name"] = "required | string";
        $rules ["email"] = "required | email";


        return $rules;
    }
}
