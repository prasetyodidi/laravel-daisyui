<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\StudentClass;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Student::class);
    }

    public function index(): View
    {
        $students = Student::query()->with('studentClass')->paginate(10);

        return View('student.index', compact('students'));

    }

    public function create(): View
    {
        $classes = StudentClass::pluck('class_name', 'id');

        $genders = [
            ['id' => Gender::Man, 'name' => 'Laki - laki'],
            ['id' => Gender::Women, 'name' => 'Perempuan'],
        ];

        return View('student.create', compact('classes', 'genders'));

    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        try {

            $data = [
                'name' => $request->input('name'),
                'classes_id' => $request->input('student-class'),
                'student_id_number' => $request->input('student-id-number'),
                'address' => $request->input('address'),
                'gender' => $request->input('gender'),
            ];

            Student::query()->create($data);

            return redirect()->route('student.index')->with('success', 'Berhasil menambahkan data siswa');


        } catch (Exception $exception) {

            return redirect()->route('student.index')->with('fail', 'Gagal menambahkan data siswa');

        }
    }

    public function show(Student $student): View
    {

        return View('student.show', compact('student'));

    }

    public function edit(Student $student): View
    {

        $classes = StudentClass::all();

        $genders = [
            ['id' => Gender::Man->value, 'name' => 'Laki - laki'],
            ['id' => Gender::Women->value, 'name' => 'Perempuan'],
        ];

        return View('student.edit', compact('student', 'classes', 'genders'));

    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        try {

            $data = [
                'name' => $request->input('name'),
                'classes_id' => $request->input('student-class'),
                'student_id_number' => $request->input('student-id-number'),
                'address' => $request->input('address'),
                'gender' => $request->input('gender'),
            ];

            $student->update($data);

            return redirect()->route('students.index')->with('success', 'Berhasil mengubah data siswa');

        } catch (Exception $exception) {

            return redirect()->route('students.index')->with('fail', 'Gagal mengubah data siswa');

        }
    }

    public function destroy(Student $student): RedirectResponse
    {
        try {

            $student->delete();

            return redirect()->route('students.index')->with('success', 'Berhasil menghapus data siswa');

        } catch (Exception $exception) {

            return redirect()->route('students.index')->with('fail', 'Gagal menghapus data siswa');

        }
    }
}
