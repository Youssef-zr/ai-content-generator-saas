<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "email" => "required|string|max:255|email|unique:users,email",
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            "roles" => 'required|array'
        ];

        $method = strtolower(request()->method());
        if ($method == "put") {
            $rules["email"] = "required|string|max:255|email|unique:users,email," . request()->user->id;
            $rules['password'][0] = "nullable";
        }

        return $rules;
    }
}
