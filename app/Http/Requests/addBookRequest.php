<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addBookRequest extends FormRequest
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
            'name' => 'required|max:40|unique:books,name',
            'author' => 'required|integer',
            'year' => 'required|integer|min:0|max:2020',
            'edition' => 'required|integer'
        ];
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}
