<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EngineRequest extends FormRequest
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
            "title" => "required|string|max:255|unique:engines,title",
            "value" => "required|string|max:255|unique:engines,value",
        ];

        $method = strtolower(request()->method());
        if ($method == "put") {
            $rules = [
                "title" => "required|string|max:255|unique:engines,title," . request()->engine->id,
                "value" => "required|string|max:255|unique:engines,value," . request()->engine->id,
            ];
        }

        return $rules;
    }
}
