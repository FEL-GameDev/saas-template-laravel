<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInvite;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();
        $this->authorize('viewList', $request->user());

        $users = User::where('account_id', $user->account_id)->get();
        $invited = UserInvite::where('account_id', $user->account_id)->get();

        return Inertia::render('Users/UsersIndex', [
            "users" => $users,
            "can_invite" => $user->can('invite', User::class),
            'invited_users' => $invited,
        ]);
    }
}