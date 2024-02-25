<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\PasswordUpdateRequest;
use App\Services\User\UserPasswordUpdate;
use Illuminate\Http\RedirectResponse;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(PasswordUpdateRequest $request): RedirectResponse
    {
        UserPasswordUpdate::update($request->user(), $request->validated()['password']);

        return back();
    }
}
