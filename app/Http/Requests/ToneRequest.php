<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToneRequest extends FormRequest
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
            'tone' => 'required|string|max:255|unique:tones,tone'
        ];

        $method = strtolower(request()->method());
        if ($method == "put") {
            $rules['tone'] = "required|string|max:255|unique:tones,tone," . intval(request()->segment(3));
        }

        return $rules;
    }
}
