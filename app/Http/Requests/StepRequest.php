<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRequest extends FormRequest
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
            'title'=>'required|max:191',
            'category_id'=>'required',
            'description'=>'required|max:191',
            'introduction'=>'max:191',
            'achievement_time'=>'integer | between:1,30',
            'achievement_time'=>'required|integer| between:1,10000'
        ];
    }

    public function messages(){
        return[
            'title.required'=>'タイトルを入力してください。',
            'title.max'=>'タイトルは191文字以内で入力してください。',
            'category.required'=>'カテゴリーを選択してください。',
            'description.required'=>'説明文を入力してください。',
            'description.max'=>'説明文は191文字以内で入力してください。',
            'achievement_time.required'=>'目安時間を入力してください。',
            'achievement_time.integer'=>'目安時間は整数で入力してください。',
            'achievement_time.between'=>'目安時間は1~10000時間の範囲内で指定してください。',
        ];
    }
}
