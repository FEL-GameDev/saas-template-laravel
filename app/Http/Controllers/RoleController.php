<?php

namespace App\Http\Controllers;

use App\DTO\Role\CreateRoleDTO;
use App\Http\Requests\Roles\RoleCreateRequest;
use App\Models\Role;
use App\Services\Role\CreateRole;
use App\Services\Role\GetRole;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    public function index(Request $request): Response
    {
        $this->authorize('manage', [Role::class]);

        $roles = GetRole::getAllWithCount();

        return Inertia::render('Roles/RolesIndex', [
            "roles" => $roles
        ]);
    }

    public function store(RoleCreateRequest $request): void
    {
        $this->authorize('create', [Role::class, $request->user()]);

        $roleDTO = CreateRoleDTO::create(
            roleCode: $request->role_code,
            name: $request->name,
            description: $request->description
        );

        CreateRole::create($roleDTO);
    }

    public function create(Request $request): Response
    {
        $this->authorize('create', [Role::class, $request->user()]);

        return Inertia::render('Roles/RoleCreate');
    }

    public function destroy(Role $role): void
    {
        $this->authorize('delete', [Role::class, $role]);

        $role->delete();
    }
}
