<?php

namespace App\Http\Requests;

use App\Models\Violation;
use Illuminate\Foundation\Http\FormRequest;

class StoreViolationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', Violation::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'violation-name' => 'required',
            'violation-point' => 'required|numeric',
            'violation-type' => 'required',
        ];
    }
}
