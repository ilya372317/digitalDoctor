<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|unique:blog_category_models,title',
            'slug' => 'max:200|unique:blog_category_models,slug',
            'parent_id' => 'required|exists:blog_category_models,id'
        ];
    }

    public function messages()
    {
        return [
          'title.required' => 'У категории должно быть название',
          'title.min' => 'Название категории должно быть не короче трех символов',
            'title.unique' => 'Название должно быть уникальным',
            'slug.max' => 'Длина индификатора не должна превышать 200 символов',
            'slug.unique' => 'Индификатор должен быть уникальным',
            'parent_id.required' => 'Выберите родительскую категория',
            'parent_id.exists' => 'Выбранной родительской категории не существует',
        ];
    }
}
