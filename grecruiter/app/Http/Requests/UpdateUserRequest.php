<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nickname' => 'required|min:10|max:100|unique:users,nickname,' . $this->user,
            'name' => 'required',
            'email' => 'required|string|max:255|email|unique:users,email,' . $this->user,
            'password' => 'required|max:255',
            'phone' => 'required|max:10|unique:users,phone,' . $this->user,
            'position_id' => 'required',
        ];
    }
}