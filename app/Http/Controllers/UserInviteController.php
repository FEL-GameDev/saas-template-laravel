<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserInviteDTO;
use App\Http\Requests\Users\StoreUserInviteRequest;
use App\Models\UserInvite;
use App\Services\UserInvite\CreateUserInvite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserInviteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserInviteRequest $request): RedirectResponse
    {
        $this->authorize('create', [UserInvite::class, $request->user()]);

        $createUserInviteDTO = CreateUserInviteDTO::create(
            name: $request->name,
            email: $request->email,
            userId: $request->user()->id,
            accountId: $request->user()->account->id
        );

        CreateUserInvite::create($createUserInviteDTO);

        return redirect(route('user_invites.create'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): Response
    {
        $this->authorize('invite', $request->user());

        return Inertia::render('Users/UsersInvite');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInvite $userInvite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInvite $userInvite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserInvite $userInvite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInvite $userInvite): void
    {
        $this->authorize('delete', [UserInvite::class, $userInvite]);

        $userInvite->delete();
    }
}
