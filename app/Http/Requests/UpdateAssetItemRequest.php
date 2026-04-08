<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAssetItemRequest extends FormRequest
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
                Rule::unique('asset_items', 'code')->ignore($this->route('asset_item')),
            ],
            'name' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'asset_category_id' => 'nullable|integer|exists:asset_categories,id',
            'asset_status_id' => 'nullable|integer|exists:asset_statuses,id',
        ];
    }
}
