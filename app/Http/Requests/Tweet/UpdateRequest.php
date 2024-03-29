<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'tweet'=>'required|max:140'
        ];
    }
    //$_POST[]で受け取るようなものはinputメソッドを使用する。
    public function tweet():string{
        return $this->input('tweet');
    }
    //ルーティング定義のurlパラメータから渡ってくるものはroute()メソッドで取得する。
    //このrouteメソッドはコントローラーにおいても使用できる。
    public function id():int{
        return (int) $this->route('tweetId');
    }
}