<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{

    public function index(): View
    {
        $roles = Role::query()->with('permissions')->get();

        return View('role.index', compact('roles'));
    }

    public function create(): View
    {
        return View('role.create');
    }

    public function edit(Role $role): View
    {
        $permissions = (new Permission())->listPermissions();
        $permissionsRole = $role->permissions->map(fn($item) => $item->name)->toArray();

        return View('role.edit', compact('role', 'permissions', 'permissionsRole'));
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $permissions = $request->input('permissions');
        try {
            $role->syncPermissions($permissions);
            $data = [
                'name' => $request->input('role_name')
            ];
            $role->update($data);
            return redirect()->route('roles.index')->with('success', 'Berhasil mengubah data role');
        } catch (Exception $exception) {
            return redirect()->route('roles.index')->with('fail', 'Gagal mengubah data role');
        }
    }

}
