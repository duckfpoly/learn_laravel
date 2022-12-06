<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
                'unique:App\Models\Products,name_product'
            ],
            'image_product' => [
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
            'desc_product' => [
                'bail',
                'required',
                'string',
            ],
            'status' => [
                'bail',
                'required',
                'string',
            ],
            'id_category' => [
                'bail',
                'required',
                'string',
            ],

        ];
    }
    public function messages(): array
    {
        return [
            'required'  => 'Không được để trống',
            'unique'    => 'Đã được dùng',
            'string'    => 'Phải là chuỗi',
        ];
    }
}
