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
}
