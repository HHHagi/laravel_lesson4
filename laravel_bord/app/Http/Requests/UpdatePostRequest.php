<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'message' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '※コメントを入力してください。',
            'title.max' => '※１００文字以下で入力してください。',
            'message.required' => '※コメントを入力してください。',
            'message.max' => '※１０００文字以下で入力してください。',

        ];
    }
}
