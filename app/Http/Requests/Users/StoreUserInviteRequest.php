<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use App\Models\UserInvite;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserInviteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(UserInvite::class, 'email'), Rule::unique(User::class, 'email')],
            'role_id' => ['required', 'integer', 'exists:roles,id']
        ];
    }
}
