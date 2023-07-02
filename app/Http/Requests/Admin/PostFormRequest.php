<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed category_id
 * @property mixed name
 * @property mixed slug
 * @property mixed description
 * @property mixed image
 * @property mixed meta_title
 * @property mixed meta_description
 * @property mixed meta_keywords
 * @property mixed status
 */
class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],
            'name' => [
                'required',
                'string',
            ],
            'slug' => [
                'required',
                'string',
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
            ],
            'meta_title' => [
                'nullable',
                'string',
            ],
            'meta_description' => [
                'nullable',
                'string',
            ],
            'meta_keywords' => [
                'nullable',
                'string',
            ],
            'status' => [
                'nullable',
            ],
        ];
    }
}
