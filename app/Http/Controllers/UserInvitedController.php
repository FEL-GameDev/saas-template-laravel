<?php

namespace App\Http\Controllers;

use App\DTO\RegisterUserInviteDTO;
use App\Http\Controllers\Controller;
use App\Services\UserInvite\GetUserInvite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Hash;

class UserInvitedController extends Controller
{
    public function invited(string $inviteCode): RedirectResponse | Response
    {
        $invitedUser = GetUserInvite::get($inviteCode);

        if (!$invitedUser) {
            return redirect(route('root'));
        }

        return Inertia::render('InvitedUsers/InvitedUsersIndex', [
            'inviteCode' => $invitedUser['invite_code'],
            'name' => $invitedUser['name'],
            'email' => $invitedUser['email'],
            'organization' => $invitedUser->account->name,
        ]);
    }

    public function accept_invite(Request $request)
    {
        $request->validate();

        $userInviteDTO = RegisterUserInviteDTO::create(
            $request->name,
            $request->email,
            Hash::make($request->password),
            $request->inviteCode
        );
    }
}
