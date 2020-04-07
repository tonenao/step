<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'subject' => 'required|max:191',
            'comment' => 'required|max:1000'
        ];
    }

    // public function message() {
    //     return [
    //         'email.required'=>'emailを入力してください。',
    //         'email.email'=>'emailの形式で入力してください。',
    //         'subject.required'=>'件名を入力してください。',
    //         'subject.max'=>'件名は191文字以内で入力してください。',
    //         'comment.required'=>'問い合わせ内容を入力してください。',
    //         'comment.max'=>'問い合わせ内容は1000文字以内で入力してください。'
    //     ];
    // }
}
