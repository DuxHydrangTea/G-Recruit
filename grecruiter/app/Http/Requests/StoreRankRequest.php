<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRankRequest extends FormRequest
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
            //
            'rank_name' => 'required',
            'esport_id' => 'required',
            'icon' => 'required|file',
        ];
    }
    public function messages()
    {
        return [
            //
            'rank_name' => 'Name of rank is required',
            'esport_id' => 'ID esport is required',
            'icon' => 'Image icon is required',
        ];
    }
}