<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategories extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name_category' => [
                'bail',
                'required',
                'string',
                'unique:App\Models\Categories,name_category',
            ]
        ];
    }
    public function messages(): array
    {
        return [
            'required'  => 'Bắt buộc phải điền',
            'unique'    => 'Đã được dùng',
        ];
    }

}
