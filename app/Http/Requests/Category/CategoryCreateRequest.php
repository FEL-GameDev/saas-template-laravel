<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', Rule::unique(Category::class, "name")->where('account_id', $this->user()->account->id) ],
            'description' => 'nullable|string|max:255',
        ];

        foreach ($this->input('subCategories', []) as $index => $subCategory) {
            $rules["subCategories.$index.name"] = $subCategory['description'] ? 'required|string|max:255' : 'nullable|string|max:255';
            $rules["subCategories.$index.description"] = 'nullable|string|max:255';
        }

        return $rules;
    }

    public function messages(): array
    {
        $messages = parent::messages();

        foreach ($this->input('subCategories', []) as $index => $subCategory) {
            $messages["subCategories.$index.name.required"] = 'The subcategory name field is required when a description is provided';
            $messages["subCategories.$index.name.string"] = 'The subcategory name field must be a string';
            $messages["subCategories.$index.name.max"] = 'The name subcategory field must not exceed 255 characters';
            $messages["subCategories.$index.description.required"] = 'The subcategory description field is required';
            $messages["subCategories.$index.description.string"] = 'The subcategory description field must be a string';
            $messages["subCategories.$index.description.max"] = 'The subcategory description field must not exceed 255 characters';
        }

        return $messages;
    }
}
