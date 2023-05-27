<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentViolationRequest;
use App\Http\Requests\UpdateStudentViolationRequest;
use App\Models\Student;
use App\Models\StudentViolation;
use App\Models\Violation;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentViolationController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(StudentViolation::class);
    }

    public function index(): View
    {
        $studentViolations = StudentViolation::with(['student', 'student.studentClass', 'reported', 'violation'])
            ->orderBy('violated_at', 'desc')
            ->paginate(10);

        return View('student-violation.index', compact('studentViolations'));
    }

    public function create(): View
    {
        $students = Student::pluck('name', 'id');
        $violations = Violation::pluck('violation_name', 'id');

        return View('student-violation.create', compact('students', 'violations'));
    }

    public function store(StoreStudentViolationRequest $request): RedirectResponse
    {
        try {
            $data = [
                'students_id' => $request->input('student'),
                'violations_id' => $request->input('violation'),
                'reported_by' => auth()->id(),
                'violated_at' => $request->input('violated_at'),
            ];
            StudentViolation::query()->create($data);

            return redirect()
                ->route('student-violations.index')
                ->with('success', 'Berhasil menambahkan pelanggaran siswa');
        } catch (Exception $exception) {
            return redirect()
                ->route('student-violations.index')
                ->with('fail', 'gagal menambahkan pelanggaran siswa');

        }
    }

    public function show(StudentViolation $studentViolation): View
    {
        return View('student-violation.show', compact('studentViolation'));
    }

    public function edit(StudentViolation $studentViolation): View
    {
        $students = Student::pluck('name', 'id');
        $violations = Violation::pluck('violation_name', 'id');

        $studentViolation->violated_at = Carbon::create($studentViolation->violated_at)->format('Y-m-d');

        return View('student-violation.edit', compact('studentViolation', 'students', 'violations'));
    }

    public function update(UpdateStudentViolationRequest $request, StudentViolation $studentViolation): RedirectResponse
    {
        try {
            $data = [
                'students_id' => $request->input('student'),
                'violations_id' => $request->input('violation'),
                'reported_id' => auth()->id(),
                'violated_at' => $request->input('violated_at'),
            ];
            $studentViolation->update($data);

            return redirect()
                ->route('student-violations.index')
                ->with('success', 'Berhasil mengubah pelanggaran siswa');
        } catch (Exception $exception) {

            return redirect()
                ->route('student-violations.index')
                ->with('success', 'Berhasil mengubah pelanggaran siswa');
        }
    }

    public function destroy(StudentViolation $studentViolation): RedirectResponse
    {
        try {
            $studentViolation->delete();

            return redirect()
                ->route('student-violations.index')
                ->with('success', 'Berhasil menghapus pelanggaran siswa');
        } catch (Exception $exception) {

            return redirect()
                ->route('student-violations.index')
                ->with('success', 'Berhasil menghapus pelanggaran siswa');
        }
    }
}
