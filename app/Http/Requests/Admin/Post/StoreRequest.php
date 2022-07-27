<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'exists:categories,id' это значит, что значение категории должно быть в таблице categories в столбце id
            'category_id' => 'integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            // значение тэга в массиве тегов должно быть в таблице тэгов в столбце id
            'tag_ids.*' => 'integer|exists:tags,id',
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'file',
            'main_image' => 'file'
        ];
    }

    public function messages()
    {
        // зарезервированный метод, для работы с сообщениями в случае ошибки (переопределяю сообщения)
        return [
            // если проблема при валидации с required (обязательностью значения в поле), то следующее сообщение выдай
            'title.required' => 'Это поле является обязательным для заполнения',
            'title.string' => 'Значение должно быть строкой',
            'category_id.exists' => 'Такой категории нет в БД',
            'tag_ids.array' => 'Данные должны быть массивом',
            'preview_image.file' => 'Тип данных не соответствует ожиданиям. Данные должны быть файлом.',
            'main_image.file' => 'Тип данных не соответствует ожиданиям. Данные должны быть файлом.'
        ];
    }
}
