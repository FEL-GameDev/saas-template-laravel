<?php

namespace App\Http\Requests\ProductModel;

use Illuminate\Foundation\Http\FormRequest;

class ProductModelUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'product_id' => 'required|integer|exists:product_models,id'
        ];
    }
}
