<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TeacherController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Teacher::class);
    }

    public function index(): View
    {
        $teachers = User::role('teacher')->paginate(10);

        return View('teacher.index', compact('teachers'));
    }

    public function create(): View
    {
        return View('teacher.create');
    }

    public function store(StoreTeacherRequest $request): RedirectResponse
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'employee_id_number' => $request->input('employee-id-number'),
                'subject' => $request->input('subject'),
            ];
            $teacher = User::query()->create($data);
            $teacher->assignRole('teacher');

            return redirect()->route('teacher.index')->with('success', 'Berhasil menambahkan guru');
        } catch (Exception $exception) {
            return redirect()->route('teacher.index')->with('fail', 'Gagal menambahkan guru');
        }
    }

    public function show(Teacher $teacher): View
    {
        return View('teacher.show', compact('teacher'));
    }

    public function edit(Teacher $teacher): View
    {
        return View('teacher.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher): RedirectResponse
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'employee_id_number' => $request->input('employee-id-number'),
                'subject' => $request->input('subject'),
            ];
            $teacher->update($data);

            return redirect()->route('teacher.index')->with('success', 'Berhasil mengubah data guru');
        } catch (Exception $exception) {
            return redirect()->route('teacher.index')->with('fail', 'Gagal mengubah data guru');
        }
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        try {
            $teacher->delete();
            return redirect()->route('teacher.index')->with('success', 'Berhasil menghapus data guru');
        } catch (Exception $exception) {
            return redirect()->route('teacher.index')->with('fail', 'Gagal menghapus data guru');
        }
    }
}
