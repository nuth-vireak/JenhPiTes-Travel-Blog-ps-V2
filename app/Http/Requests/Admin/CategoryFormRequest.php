<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed name
 * @property mixed slug
 * @property mixed description
 * @property mixed image
 * @property mixed meta_title
 * @property mixed meta_description
 * @property mixed meta_keywords
 * @property mixed navbar_status
 * @property mixed status
 */
class CategoryFormRequest extends FormRequest
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
            'name'=> [
                'required',
                'string',
                'max:200',
            ],
            'slug'=> [
                'required',
                'string',
                'max:200',
            ],
            'description'=> [
                'required'
            ],
            'image'=> [
                'nullable',
                'mimes:jpeg,jpg,png',
            ],
            'meta_title'=> [
                'required',
                'string',
                'max:200',
            ],
            'meta_description'=> [
                'required',
                'string',
                'max:200',
            ],
            'meta_keywords'=> [
                'required',
                'string',
                'max:200',
            ],
            'navbar_status'=> [
                'nullable',
            ],
            'status'=> [
                'nullable',
            ],
        ];
    }
}
