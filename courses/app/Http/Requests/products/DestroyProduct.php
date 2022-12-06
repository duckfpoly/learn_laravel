<?php

namespace App\Http\Requests\products;

use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyProduct extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'product' => [
                'required',
                Rule::exists(Products::class,'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['product' => $this->route('product')]);
    }
}
