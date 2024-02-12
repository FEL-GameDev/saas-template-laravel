<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\RoleCreateRequest;
use App\Models\Role;
use App\Services\Role\GetRole;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    public function index(Request $request): Response
    {
        $this->authorize('manage', [Role::class]);

        // TODO Role fetching via service
        $roles = GetRole::getAllWithCount($request->user()->account_id);

        return Inertia::render('Roles/RolesIndex', [
            "roles" => $roles
        ]);
    }

    public function create(Request $request): Response
    {
        $this->authorize('create', [Role::class, $request->user()]);

        return Inertia::render('Roles/RoleCreate');
    }

    public function store(RoleCreateRequest $request): void
    {
        $this->authorize('create', [Role::class, $request->user()]);

        Role::create([
            "name" => $request->name,
            "description" => $request->description,
            "role_code" => $request->role_code,
            "account_id" => $request->user()->account_id,
        ]);
    }

    public function destroy(Role $role): void
    {
        $this->authorize('delete', [Role::class, $role]);

        $role->delete();
    }
}
