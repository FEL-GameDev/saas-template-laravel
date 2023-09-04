<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreUserInviteRequest;
use App\Models\UserInvite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserInviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $invites = UserInvite::where('account_id', $request->user()->account_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->authorize('invite', $request->user());

        return Inertia::render('Users/UsersInvite');
    }

    /**
     * Store a newly created resource in storage.
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
    public function destroy(UserInvite $userInvite)
    {
        $this->authorize('delete', [UserInvite::class, $userInvite]);

        $userInvite->delete();
    }
}