<?php

namespace App\Http\Requests\Customize;

use Illuminate\Foundation\Http\FormRequest;

class PricingRequest extends FormRequest
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
            'hero_title' => 'sometimes|nullable|max:255',
            'hero_subtitle' => 'sometimes|nullable|max:255',
            'hero_cta' => 'sometimes|nullable|max:255',
            'hero_promotion' => 'sometimes|nullable|max:255',
        ];
    }
}
