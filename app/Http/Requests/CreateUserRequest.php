<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'first_name'     => 'required|alpha',
            'last_name'      => 'required|alpha',
            'email'          => 'required|max:50|email|unique:users',
            'username'       => 'required|max:20|min:3|unique:users',
            'password'       => 'required|min:6',
            'password_again' => 'required|same:password'
        ];
    }
}
