<?php

namespace App\Http\Requests\api;

class AuthorizationRequest extends BaseRequest
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
            'email' => self::EMAIL . '|exists:users,email',
            'password' => self::PASSWORD
        ];
    }
}
