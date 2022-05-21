<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevicesRequest extends FormRequest
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
    public function rules(): array
    {
        return [
//            'uid' => 'required|unique:devices',
            'appId' => 'required',
            'language' => 'required',
            'os' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
//            'uid.required' => 'Register OK',
            'appId' => 'appId Required',
            'language' => 'required',
            'os' => 'required'
        ];
    }
}
