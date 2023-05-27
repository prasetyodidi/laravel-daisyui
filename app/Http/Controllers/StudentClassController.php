<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentClassRequest;
use App\Http\Requests\UpdateStudentClassRequest;
use App\Models\StudentClass;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentClassController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(StudentClass::class);
    }

    public function index(): View
    {
        $studentClasses = StudentClass::query()->with('homeroomTeacher')->paginate(10);

        return View('student-class.index', compact('studentClasses'));
    }

    public function create(): View
    {
        $teachers = Teacher::pluck('name', 'id');

        return View('student-class.create', compact('teachers'));
    }

    public function store(StoreStudentClassRequest $request): RedirectResponse
    {
        try {

            $data = [
                'homeroom_teachers_id' => $request->input('homeroom_teacher'),
                'class_name' => $request->input('class_name')
            ];

            StudentClass::query()->create($data);

            return redirect()->route('student-classes.index')->with('success', 'Berhasil menambahkan data kelas');

        } catch (Exception $exception) {
            return redirect()->route('student-classes.index')->with('fail', 'Gagal menambahkan data kelas');
        }
    }

    public function show(StudentClass $studentClass): View
    {
        return View('student-class.show', compact('studentClass'));
    }

    public function edit(StudentClass $studentClass): View
    {
        $teachers = User::role('teacher')->get();

        return View('student-class.edit', compact('studentClass', 'teachers'));
    }

    public function update(UpdateStudentClassRequest $request, StudentClass $studentClass): RedirectResponse
    {
        try {

            $data = [
                'homeroom_teachers_id' => $request->input('homeroom_teacher'),
                'class_name' => $request->input('class_name')
            ];

            $studentClass->update($data);

            return redirect()->route('student-classes.index')->with('success', 'Berhasil mengubah data kelas');

        } catch (Exception $exception) {
            return redirect()->route('student-classes.index')->with('fail', 'Gagal mengubah data kelas');
        }
    }

    public function destroy(StudentClass $studentClass): RedirectResponse
    {
        try {

            $studentClass->delete();

            return redirect()->route('student-classes.index')->with('success', 'Berhasil menghapus data kelas');

        } catch (Exception $exception) {
            return redirect()->route('student-classes.index')->with('fail', 'Gagal menghapus data kelas');
        }
    }
}
