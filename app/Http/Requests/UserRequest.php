<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name'=>'max:191',
            'email'=>['required','email','max:191',Rule::unique('email')->ignore($user->id),],
            'introduction'=>'max:191',
            'pic'=>'image|mimes:jpeg,png,jpg|max:2048'
        ];

        // return [
        //     'name'=>'max:191',
        //     'email'=>'required|email|max:191|unique:users,email',
        //     'introduction'=>'max:191',
        //     'pic'=>'image|mimes:jpeg,png,jpg|max:2048'
        // ];
    }

    public function messages(){
        return[
            'name.max'=>'名前は191文字以内で入力してください。',
            'email.required'=>'emailを入力してください。',
            'email.email'=>'emailの形式で入力してください。',
            'email.max'=>'emailは191文字以内で入力してください。',
            'introduction.max'=>'自己紹介文は191文字以内で入力してください。',
            'pic.image'=>'画像ファイルを選択してください。',
            'pic.mimes'=>'選択できる画像はJPEG・JPG・PNG形式のみです。',
            'pic.max'=>'2MB以下のファイルを選択してください。',
        ];
    }
}
