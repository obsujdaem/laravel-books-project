<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBookRequest extends BooksRequest
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
            'name' => self::NAME,
            'author' => self::INTEGER . '|exists:authors,id',
            'year' => self::YEAR,
            'edition' => self::INTEGER . '|exists:editions,id'
        ];
    }
}
