<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromptRequest extends FormRequest
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
            "type" => "required|string",
            "title" => "required|string|unique:prompts,title",
            "description" => "required|string",
            "prompt" => "required|string",
            "engine_id" => "sometimes|nullable",
            "max_tokens" => "sometimes|nullable",
            "category_id" => "required|string",
            "tone_id" => "sometimes|nullable",
            "questions" => 'sometimes|nullable|array'
        ];

        $method = strtolower(request()->method());
        if ($method == "put") {
            $rules = [
                "title" => "required|string|unique:prompts,title," . intval(request()->segment(3)),
            ];
        }
        return $rules;
    }
}
