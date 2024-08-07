<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->id){
            return [
                'email' => "required|email",
                'password' => "nullable",
                'phone' => 'required|unique:parents,phone,'.$this->id,

            ];
        }
        else{
            return [
                'email' => "required|email",
                'password' => "required",
                'phone' => 'required|unique:parents,phone',

            ];
        }
    }
}
