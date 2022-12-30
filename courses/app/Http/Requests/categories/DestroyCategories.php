<?php

namespace App\Http\Requests\categories;

use App\Models\categories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyCategories extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'category' => [
                'required',
                Rule::exists(categories::class,'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['category' => $this->route('category')]);
    }
}
