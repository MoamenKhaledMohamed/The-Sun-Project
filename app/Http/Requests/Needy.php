<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Needy extends FormRequest
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
        // adde rules to validate the data of outputs 
        $rules = [
            "types.*.type"    => "required|string",
            "types.*.amount"    => "required|integer",
        ];

         if ($this->path() === 'api/needy/create2') {
            return $rules;
        }

        // validate the data of needy if it is found 
        $rules ["first_name"] = "required | string";
        $rules ["last_name"] = "required | string";
        $rules ["typeNeedy"] = "required | string";
        $rules ["description"] = "required | string";
        $rules ["photo"] = "required | string";
        
       
        return $rules;
    }
}
