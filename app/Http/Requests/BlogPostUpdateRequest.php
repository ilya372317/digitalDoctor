<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'image' => 'image',
            'content_raw' => 'string|required',
            'category_id' => 'integer|required|exists:blog_category_models,id',
            'is_published' => 'integer'
            
        ];
    }
    
    public function messages()
    {
        parent::messages();
        return [
            'title.required' => 'Заголовок обязателен для заполнения',
            'title.string' => 'Заголовок должен иметь тип строки',
            'content_raw.string' => 'Тело записи должно быть строкой',
            'content_raw.required' => 'Тело записи обязательно для заполнения',
            'category_id.integer' => 'Переданн не верный тип категории',
            'category_id.required' => 'Поле категория записи обязательно для заполнения',
            'category_id.exists' => 'Выбранной категории не существует',
            'is_published' => 'Ошибка публикации'
        ];
    }
}
