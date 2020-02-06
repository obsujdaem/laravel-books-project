<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    protected const LOGIN = 'required|min:6|max:18';
    protected const PASSWORD = 'required|min:6|max:18|alpha_num';
    protected const EMAIL = 'required|max:64|min:8';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
