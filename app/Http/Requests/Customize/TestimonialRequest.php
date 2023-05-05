<?php

namespace App\Http\Requests\Customize;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'testimonial_name' => 'sometimes|nullable|max:255',
            'testimonial_title' => 'sometimes|nullable|max:255',
            'testimonial_avatar' => "nullable|image|mimes:png,jpg,jpeg,gif",
            'testimonial_review' => 'sometimes|nullable|max:255',
        ];
    }
}
