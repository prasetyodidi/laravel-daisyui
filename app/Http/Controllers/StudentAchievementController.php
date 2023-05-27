<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentAchievementRequest;
use App\Http\Requests\UpdateStudentAchievementRequest;
use App\Models\Achievement;
use App\Models\Student;
use App\Models\StudentAchievement;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentAchievementController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(StudentAchievement::class);
    }

    public function index(): View
    {
        $studentAchievements = StudentAchievement::with(['student', 'student.studentClass', 'reported', 'achievement'])
            ->orderBy('achieved_at', 'desc')
            ->paginate(10);

        return View('student-achievement.index', compact('studentAchievements'));
    }

    public function create(): View
    {
        $students = Student::pluck('name', 'id');
        $achievements = Achievement::pluck('achievement_name', 'id');

        return VIew('student-achievement.create', compact('students', 'achievements'));
    }

    public function store(StoreStudentAchievementRequest $request): RedirectResponse
    {
        try {
            $data = [
                'students_id' => $request->input('student'),
                'achievements_id' => $request->input('achievement'),
                'reported_by' => auth()->id(),
                'achieved_at' => $request->input('achieved_at'),
            ];
            StudentAchievement::query()->create($data);

            return redirect()
                ->route('student-achievements.index')
                ->with('success', 'Berhasil menambahkan pencapaian siswa');
        } catch (Exception $exception) {
            return redirect()
                ->route('student-achievements.index')
                ->with('fail', 'gagal menambahkan pencapaian siswa');
        }
    }

    public function show(StudentAchievement $studentAchievement): View
    {
        return View('student-achievement.show', compact('studentAchievement'));
    }

    public function edit(StudentAchievement $studentAchievement): View
    {

        $students = Student::pluck('name', 'id');
        $achievements = Achievement::pluck('achievement_name', 'id');

        $studentAchievement->achieved_at = Carbon::create($studentAchievement->achieved_at)->format('Y-m-d');

        return View('student-achievement.edit', compact('studentAchievement', 'students', 'achievements'));
    }

    public function update(UpdateStudentAchievementRequest $request, StudentAchievement $studentAchievement)
    : RedirectResponse
    {
        try {
            $data = [
                'students_id' => $request->input('student'),
                'achievements_id' => $request->input('achievement'),
                'reported_id' => auth()->id(),
                'achieved_at' => $request->input('achieved_at'),
            ];
            $studentAchievement->update($data);

            return redirect()
                ->route('student-achievements.index')
                ->with('success', 'Berhasil mengubah pencapaian siswa');
        } catch (Exception $exception) {

            return redirect()
                ->route('student-achievements.index')
                ->with('success', 'Berhasil mengubah pencapaian siswa');
        }
    }

    public function destroy(StudentAchievement $studentAchievement): RedirectResponse
    {
        try {
            $studentAchievement->delete();

            return redirect()
                ->route('student-achievements.index')
                ->with('success', 'Berhasil menghapus pencapaian siswa');
        } catch (Exception $exception) {

            return redirect()
                ->route('student-achievements.index')
                ->with('success', 'Berhasil menghapus pencapaian siswa');
        }
    }
}
