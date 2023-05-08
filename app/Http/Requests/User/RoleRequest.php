<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            "name" => "required|string|max:255|unique:roles,name",
            "permissions" => "required|array",
        ];

        $method = strtolower(request()->method());
        if ($method == "put") {
            $rules["name"] = "required|string|max:255|unique:roles,name," . request()->role->id;
        }

        return $rules;
    }
}
