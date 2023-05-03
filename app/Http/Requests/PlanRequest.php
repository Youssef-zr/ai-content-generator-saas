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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price_monthly' => 'required|integer',
            'price_yearly' => 'required|integer',
            'type' => 'required|string',
            'word_limit' => 'required|integer',
            'image_limit' => 'required|integer',
            'pp_monthly_plan' => 'sometimes|nullable|string|max:255|unique:plans,pp_monthly_plan',
            'pp_yearly_plan' => 'sometimes|nullable|string|max:255|unique:plans,pp_yearly_plan',
        ];

        $method = strtolower(request()->method());
        if ($method == "put") {
            $rules["pp_monthly_plan"] = 'sometimes|nullable|string|max:255|unique:plans,pp_monthly_plan,' . request()->plan->id;
            $rules["pp_yearly_plan"] = 'sometimes|nullable|string|max:255|unique:plans,pp_yearly_plan,' . request()->plan->id;
        }

        return $rules;
    }
}
