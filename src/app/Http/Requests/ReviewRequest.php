<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comment' => 'max:400',
            'upload_file' => 'mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'comment.max' => '※400字以内で記入してください',
            'upload_file.mimes' => '※画像の形式はjpegかpngのみとなります'
        ];
    }
}
