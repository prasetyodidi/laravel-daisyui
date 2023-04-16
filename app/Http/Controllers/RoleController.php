<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\View\View;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role): View
    {
//        $permissions = Permission::pluck('name', 'id');

        $permissions = [
            'activity' => ['create', 'delete', 'list', 'force delete', 'restore', 'update', 'view'],
            'student' => ['create', 'delete', 'list', 'force delete', 'restore', 'update', 'view'],
            'violation' => ['create', 'delete', 'list', 'force delete', 'restore', 'update', 'view'],
        ];

        return View('role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
