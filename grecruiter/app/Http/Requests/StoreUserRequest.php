<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nickname' => 'required|min:10|max:100|unique:users,nickname',
            'name' => 'required',
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => 'required|max:255',
            'phone' => 'required|max:10',
            'avatar' => 'required',
            'position_id' => 'required',
        ];
    }
}