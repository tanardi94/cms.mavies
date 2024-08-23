<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function getRoles(): Collection
    {
        return Role::all();
    }

    public function createRole(Request $request)
    {
        Role::create([
            'name' => $request->input('name'),
        ]);
    }

    public function createPermission(Request $request)
    {
        Permission::create([
            'name' => $request->input('name'),
        ]);
    }

    public function giveUserRole(User $user, Permission $permission)
    {
        $user->assignRole($permission->name);
    }
}
