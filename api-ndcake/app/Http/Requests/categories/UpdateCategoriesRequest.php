<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
//            'name_category' => [
//                'bail',
//                'required',
//                'string',
//                'unique:App\Models\Categories,name_category',
////                Rule::unique(Course::class)->ignore($this->course->id_course),
//            ]
        ];
    }
//    public function messages(): array
//    {
//        return [
//            'required'  => 'Bắt buộc phải điền',
//            'unique'    => 'Đã được dùng',
//        ];
//    }
}
