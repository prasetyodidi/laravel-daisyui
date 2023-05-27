<?php

namespace App\Http\Requests;

use App\Models\AchievementType;
use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', AchievementType::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'achievement_type_name' => 'required'
        ];
    }
}
