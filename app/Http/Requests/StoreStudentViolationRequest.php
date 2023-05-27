<?php

namespace App\Http\Requests;

use App\Models\StudentViolation;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentViolationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', StudentViolation::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'student' => 'required',
            'violation' => 'required',
            'violated_at' => 'required'
        ];
    }
}
