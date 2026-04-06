<?php

namespace Modules\AdministratorModule\Http\Requests\Company;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'code' => 'required|string|max:255|unique:branches',
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
        ];
    }
}
