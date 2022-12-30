<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategories extends FormRequest
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
                'unique:App\Models\categories,name_category'
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'required'  => 'Không được để trống',
            'unique'    => 'Tên đã được dùng',
        ];
    }
}
