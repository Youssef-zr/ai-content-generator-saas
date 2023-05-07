<?php

namespace App\Http\Requests\Customize;

use Illuminate\Foundation\Http\FormRequest;

class LandingPageRequest extends FormRequest
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
        return [
            "hero_title" => "required|string|max:255",
            "partners" => "required|array",
            "story_title" => "required|string|max:255",
            "pricing_title" => "required|string|max:255",
            "testimonial_title" => "required|string|max:255",
        ];
    }
}
