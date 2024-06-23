<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Category::class, "name")
                    ->where('account_id', $this->user()->account->id)
                    ->ignore($this->category_id, 'id')
            ],
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }
}
