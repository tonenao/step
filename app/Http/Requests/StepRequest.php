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
            'title'=>'required|max:30',
            'category_id'=>'required',
            'description'=>'required|max:255',
            'achievement_time'=>'required|numeric'
        ];
    }

    public function message(){
        return[
            'title.required'=>'タイトルを入力してください。',
            'title.max'=>'タイトルは30文字以内で入力してください。',

        ];
    }
}
