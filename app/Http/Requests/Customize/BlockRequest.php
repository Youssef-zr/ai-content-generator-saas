<?php

namespace App\Http\Requests\Customize;

use Illuminate\Foundation\Http\FormRequest;

class BlockRequest extends FormRequest
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
            "title" => "required|string|max:255|unique:blocks,title",
            "subtitle" => "required|string|max:255",
            "icon" => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif'
        ];

        $method = strtolower(request()->method());
        if ($method == "put") {
            $rules['title'] = "required|string|max:255|unique:blocks,title," . request()->block->id;
        }

        return $rules;
    }
}
