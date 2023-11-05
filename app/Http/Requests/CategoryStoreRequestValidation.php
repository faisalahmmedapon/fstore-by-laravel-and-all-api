<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequestValidation extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload.
            'custom_serial_number' => 'nullable|integer|unique:categories,custom_serial_number',
        ];
    }

    public function messages()
    {
        return [
            'name' => array(
                'required' => 'The name is required.',
                'unique' => 'This name is taken.',
                'string' => 'The name must be a string.',
                'max' => 'The name may not be greater than :max characters.',
            ),
            'photo' => array(
                'required' => 'The photo is required.',
                'mimes' => 'jpeg,png,jpg,gif.',
                'max' => 'File size is :max .',
            ),
            'custom_serial_number' => array(
                'integer' => 'The custom serial number should integer.',
                'unique' => 'The custom serial number should unique.',
            ),
        ];
    }

}
