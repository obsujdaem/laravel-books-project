<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BooksRequest extends FormRequest
{
    protected const NAME = 'required|min:3|max:40|unique:books,name';
    protected const INTEGER = 'required|integer';
    protected const YEAR = self::INTEGER . '|min:0|max:2020';

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
