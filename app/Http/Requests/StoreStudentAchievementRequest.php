<?php

namespace App\Http\Requests;

use App\Models\StudentAchievement;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentAchievementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', StudentAchievement::class);
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
            'achievement' => 'required',
            'achieved-at' => 'required'
        ];
    }
}
