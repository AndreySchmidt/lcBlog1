<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'role' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id' // hidden поле для проверки email
            // 'email' => 'required|string|email|unique:users', не проходит апдейт из-за unique:users похоже .. добавлю хидден во вью и буду проверять по нему
            // пароль менять в апдейте я не буду, поэтому не пропускаю поле 'password' => 'required|string'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Обязательное поле для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Обязательное поле для заполнения',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Не прошло проверку на соответствие (это не email)',
            'email.unique' => 'Почтовый адрес должен быть уникальным, пользователь с таким email уже существует',
        ];
    }
}
