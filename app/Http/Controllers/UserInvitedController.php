<?php

namespace App\Http\Controllers;

use App\DTO\RegisterUserInviteDTO;
use App\Http\Requests\UserInvite\RegisterUserInviteRequest;
use App\Providers\RouteServiceProvider;
use App\Services\User\RegisterInvitedUser;
use App\Services\UserInvite\GetUserInvite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class UserInvitedController extends Controller
{
    public function invited(string $inviteCode): RedirectResponse|Response
    {
        $invitedUser = GetUserInvite::getByInviteCode($inviteCode);

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

    public function store(RegisterUserInviteRequest $request): RedirectResponse
    {
        $userInviteDTO = RegisterUserInviteDTO::create(
            name: $request->name,
            email: $request->email,
            password: Hash::make($request->password),
            inviteCode: $request->inviteCode,
        );

        $user = RegisterInvitedUser::register($userInviteDTO);

        if (!$user) {
            return redirect(route('root'));
        }
        
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
