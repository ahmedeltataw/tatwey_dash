<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaasRequest extends FormRequest
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
                'email' => "required|unique:moderators,email,".$this->id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'name' => 'required',
                'password' => 'nullable|min:6',
                'is_active'=>'nullable|in:0,1',

            ];
        }
        else{
            return [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'name' => 'required',
                'email' => "required|email|unique:moderators",
                'password' => 'required|min:6',
                'is_active'=>'nullable|in:0,1',
            ];
        }
    }
}
