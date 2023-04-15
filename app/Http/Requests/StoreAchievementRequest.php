<?php

namespace App\Http\Requests;

use App\Models\Achievement;
use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', Achievement::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'achievement-name' => 'required',
            'achievement-point' => 'required|numeric',
            'achievement-type' => 'required',
        ];
    }
}
