<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name_product' => [
                'bail',
                'required',
                'string',
            ],
            'price_product' => [
                'bail',
                'required',
                'string',
            ],
            'desc_sort_product' => [
                'bail',
                'required',
                'string',
            ],
            'status' => [
                'bail',
                'required',
                'int',
            ],
            'id_category' => [
                'bail',
                'required',
                'int',
            ],
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
