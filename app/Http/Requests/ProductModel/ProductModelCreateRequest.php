<?php

namespace App\Http\Requests\ProductModel;

use App\Models\ProductModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductModelCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|' .  Rule::unique(ProductModel::class, "name")->where('account_id', $this->user()->account->id),
            'description' => 'nullable|string|max:600',
        ];
    }
}
