<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     *  authorize メソッドはリクエストの内容に基づいた
     *  権限チェックのために使います。
     *  今回はこの機能は使用しないので true を返す
     * （つまりリクエストを受け付ける）記述のみで OK です。
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
        // 配列のキーが入力欄のname属性に対応
        // 必須入力を意味する required を指定
        return [
            'title' => 'required|max:20',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'フォルダ名',
        ];
    }
}
