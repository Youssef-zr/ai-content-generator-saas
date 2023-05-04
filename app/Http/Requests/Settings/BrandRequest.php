<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            "site_title" => 'required|string|max:255',
            "slogan" => 'required|string|max:255',
            "email" => 'sometimes|nullable|email',
            "adress" => 'sometimes|nullable|string|max:255',
            "phone" => 'sometimes|nullable|max:17',
            "version" => 'sometimes|nullable|string|max:30',
            "logo" => "nullable|image|mimes:png,jpg,jpeg,gif",
            "favicon" => "nullable|image|mimes:png,jpg,jpeg,gif",
        ];

        return $rules;
    }
}
