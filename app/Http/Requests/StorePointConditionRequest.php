<?php

namespace App\Http\Requests;

use App\Models\PointCondition;
use Illuminate\Foundation\Http\FormRequest;

class StorePointConditionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', PointCondition::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'condition_name' => 'required',
            'minimum_point' => 'required|numeric',
            'maximum_point' => 'required|numeric'
        ];
    }
}
