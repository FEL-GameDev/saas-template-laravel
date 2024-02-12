<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\Role\GetRole;
use App\Services\User\GetUser;
use App\Services\UserInvite\GetUserInvite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        $user = auth()->user();
        $this->authorize('viewList', $user);


        $users = GetUser::getAll($user->account_id);
        $invited = GetUserInvite::getByAccountId($user->account_id);

        return Inertia::render('Users/UsersIndex', [
            "users" => $users->map(function ($user) {
                return [
                    "id" => $user->id,
                    "name" => $user->name,
                    "email" => $user->email,
                    "role_name" => $user->role->name,
                    "edit_url" => route('users.edit', $user),

                ];
            }),
            "can_invite" => $user->can('invite', User::class),
            "can_manage_roles" => Gate::allows('manage', [Role::class]),
            'invited_users' => $invited,
        ]);
    }

    public function edit(User $user): Response
    {
        $this->authorize('edit', $user);

        $roles = GetRole::getAll($user->account_id);

        return Inertia::render('Users/UserEdit', [
            "user" => [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "role_id" => $user->role_id,
                "role" => $user->role,
            ],
            "roles" => $roles->map(function ($role) {
                return [
                    "id" => $role->id,
                    "name" => $role->name,
                ];
            }),
        ]);
    }

    public function update(UserUpdateRequest $userUpdateRequest, User $user): RedirectResponse
    {
        $this->authorize('edit', $userUpdateRequest->user());

        $user->fill($userUpdateRequest->validated());
        $user->save();

        return redirect()->route('users.index');
    }
}
