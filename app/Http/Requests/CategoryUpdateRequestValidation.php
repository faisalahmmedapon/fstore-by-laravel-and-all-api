<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequestValidation extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload.
            'custom_serial_number' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'name' => array(
                'unique' => 'This name is taken.',
                'string' => 'The name must be a string.',
                'max' => 'The name may not be greater than :max characters.',
            ),
            'photo' => array(
                'mimes' => 'jpeg,png,jpg,gif.',
                'max' => 'File size is :max .',
            ),
            'custom_serial_number' => array(
                'integer' => 'The custom serial number should integer.',
            ),
        ];
    }

}
