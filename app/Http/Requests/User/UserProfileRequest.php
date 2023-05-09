<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            "name" => "required|string|min:4|max:100",
            "email" => "required|email|unique:users,email," . auth()->id(),
            "image" => "sometimes|nullable|image|mimes:png,jpg,jpeg,gif"
        ];

        return $rules;
    }
}
