<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'title' => ['required', 'unique:places', 'regex:/^[\pL\s\-]+$/u'],
            'link' => 'required',
            'image' => 'requiredValidatePostSize',
            'type' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
          'title.required' => "Поле \"Место\" обязательнно к заполнению",
          'title.unique' => "Поле \"Место\" должно быть уникальным",
          'title.regex' => "Поле \"Место\" не должно местить цифры",
          'link.required' => "Поле \"Ссылка\" обязательнно к заполнению",
          'image.required' => "Поле \"Фото\" обязательнно к заполнению",
          'type.required' => "Поле \"Тип\" обязательнно к заполнению",
        ];
    }
}
