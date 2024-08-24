<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',


        ];
    }
    public function attributes(): array
    {
        return [
            'category_id' => 'category',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'category_id.required' => 'Please select category',
    //         'category_id.exists' => 'Please select valid category',
    //         'image.nullable' => 'Please upload an image',
    //         'image.mimes' => 'Only jpeg, png, and jpg images are allowed',
    //         'image.max' => 'Image size should not exceed 2MB',
    //         'title.required' => 'Title is required',
    //         'description.required' => 'Description is required',
    //     ];
    // }


}
