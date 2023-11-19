<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreUserInviteRequest;
use App\Models\UserInvite;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserInviteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(Request $request): Response
    {
        $this->authorize('invite', $request->user());

        return Inertia::render('Users/UsersInvite');
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(StoreUserInviteRequest $request)
    {
        $this->authorize('create', [UserInvite::class, $request->user()]);

        $account_id = $request->user()->account->id;
        UserInvite::create(
            [
                ...$request->validated(),
                'account_id' => $account_id,
                'user_id' => $request->user()->id,
                'invite_code' => hash("crc32", $request->email . $account_id)
            ]
        );

        return redirect(route('user_invites.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(UserInvite $userInvite): void
    {
        $this->authorize('delete', [UserInvite::class, $userInvite]);

        $userInvite->delete();
    }
}
