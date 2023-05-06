<?php

namespace App\Http\Requests\Customize;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            "story_title" => 'sometimes|nullable|string|max:255',
            "story_subtitle" => 'sometimes|nullable|string|max:255',
            "story_blocks" => 'sometimes|nullable|array',
            "story_promotion" => 'sometimes|nullable|string|max:255',
            "story_browser_image" => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
            "story_phone_image" => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
        ];
    }
}
