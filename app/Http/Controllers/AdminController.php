<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Admin::class);
    }

    public function index(): View
    {
        $admins = User::role('admin')->paginate(10);

        return View('admin.index', compact('admins'));
    }

    public function create(): View
    {
        return View('admin.create');
    }

    public function store(StoreAdminRequest $request): RedirectResponse
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'employee_id_number' => $request->input('employee_id_number'),
            ];

            $admin = User::query()->create($data);
            $admin->assignRole('admin');

            return redirect()->route('admins.index')->with('success', 'Berhasil menambahkan admin');
        } catch (Exception $exception) {
            return redirect()->route('admins.index')->with('fail', 'Gagal menambahkan admin');
        }
    }

    public function show(Admin $admin): View
    {
        return View('admin.show', compact('admin'));
    }

    public function edit(Admin $admin): View
    {
        return View('admin.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin): RedirectResponse
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'employee_id_number' => $request->input('employee_id_number'),
            ];
            $admin->update($data);

            return redirect()->route('admins.index')->with('success', 'Berhasil mengubah data admin');
        } catch (Exception $exception) {
            return redirect()->route('admins.index')->with('fail', 'Gagal mengubah data admin');
        }
    }

    public function destroy(Admin $admin): RedirectResponse
    {
        try {
            $admin->delete();
            return redirect()->route('admins.index')->with('success', 'Berhasil menghapus data admin');
        } catch (Exception $exception) {
            return redirect()->route('admins.index')->with('success', 'Gagal menghapus data admin');
        }
    }
}
