<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
{
    public function rules()
    {
        $rule = parent::rules();

        $status_rule = Rule::in(array_keys(Task::STATUS));
        // -> 'in(1, 2, 3)' を出力する
        return $rule + [
            'status' => 'required|'.$status_rule,
        ];
    }

    // 親クラス CreateTask の attributes メソッドの結果と合体した属性名リストを返却します。
    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        $status_labels = array_map(function ($item) {
            return $item['label'];
        }, Task::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attribute には '.$status_labels.' のいずれかを指定してください。',
        ];
    }
}
