<?php

namespace App\Http\Requests\products;

use App\Enums\ProductsStatusEnum;
use App\Models\categories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                'integer',
                Rule::in(ProductsStatusEnum::asArray()),
            ],
            'id_category' => [
                'bail',
                'required',
                'integer',
                Rule::exists(categories::class,'id'),
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
