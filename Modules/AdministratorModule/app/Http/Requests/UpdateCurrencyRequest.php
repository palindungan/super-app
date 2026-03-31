<?php

namespace Modules\AdministratorModule\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCurrencyRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('currencies', 'code')->ignore($this->route('currency')),
            ],
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:255',
            'minor_unit' => 'required|integer|min:0|max:255',
            'is_active' => 'required|boolean',
        ];
    }
}
