<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class AccountController extends Controller
{
    function index(Request $request): Response
    {
        Gate::authorize('is_owner', User::class);

        return Inertia::render("Account/AccountIndex");
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Gate::authorize('is_owner', User::class);

        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $this->delete_account($user);

        return Redirect::to('/');
    }

    /**
     * Deletes an account for given owner, ensure all related assets are destroyed
     *
     * @param User $user
     * @return void
     */
    private function delete_account(User $user): void
    {
        // TODO Create a service to handle this!
        $user->account()->delete();
    }
}