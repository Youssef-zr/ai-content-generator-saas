<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:plans,name',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'currency' => 'required|string',
            'belling_interval' => 'required|string|in:week,month,year',
            'type' => 'required|string|in:free,paid',
            'word_limit' => 'required|integer',
            'image_limit' => 'required|integer',
        ];

        $method = strtolower(request()->method());

        if ($method == "put") {
            $rules["name"] = 'sometimes|nullable|string|max:255|unique:plans,name,' . request()->plan->id;
        }

        return $rules;
    }
}
