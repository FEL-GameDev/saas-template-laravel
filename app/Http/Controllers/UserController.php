<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        $user = auth()->user();
        $this->authorize('viewList', $user);

        $users = User::where('account_id', $user->account_id)->get();
        $invited = UserInvite::where('account_id', $user->account_id)->get();

        return Inertia::render('Users/UsersIndex', [
            "users" => $users,
            "can_invite" => $user->can('invite', User::class),
            "can_manage_roles" => Gate::allows('manage', [Role::class]),
            'invited_users' => $invited,
        ]);
    }
}
