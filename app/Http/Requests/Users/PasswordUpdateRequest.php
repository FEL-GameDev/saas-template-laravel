<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => ['required', Password::defaults(), 'confirmed'],
            'current_password' => 'required|string|max:255|current_password',
        ];
    }
}
