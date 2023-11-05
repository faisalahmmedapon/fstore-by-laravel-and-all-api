<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequestValidation extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:500|unique:products,title',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title' => array(
                'required' => 'The title is required.',
                'unique' => 'This title is taken.',
                'string' => 'The name must be a string.',
                'max' => 'The title may not be greater than :max characters.',
            ),
            'photo' => array(
                'required' => 'The photo is required.',
                'mimes' => 'jpeg,png,jpg,gif.',
                'max' => 'File size is :max .',
            ),
            'category_id' => array(
                'required' => 'The category is required.',
            ),
            'price' => array(
                'required' => 'The price is required.',
            ),
            'description' => array(
                'required' => 'The description is required.',
            ),
        ];
    }



}
