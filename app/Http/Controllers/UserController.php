<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $this->authorize('viewList', $request->user());

        $users = User::where('account_id', $request->user()->account_id)->get();

        return Inertia::render('Users/UsersIndex', ["users" => $users]);
    }
}