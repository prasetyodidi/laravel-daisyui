<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Contracts\View\View;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Activity::class);
    }

    public function index(): View
    {
        $activities = Activity::with([
            'violation',
            'student',
            'student.studentClass'
        ])->paginate(10);

        $activities->getCollection()->transform(function ($item) {
            return [
                'created_at' => $item->created_at,
                'name' => $this->transformStudentRecordToActivity(
                    $item->violation->violation_name,
                    $item->violation->violation_point,
                    $item->student->name,
                    $item->student->studentClass->class_name,
                )
            ];
        });

        return View('activity.index', compact('activities'));
    }

    private function transformStudentRecordToActivity($violationName, $point, $studentName, $className): string
    {
        return 'berhasil menambahkan pelanggaran ' . $violationName
            . 'dengan point ' . $point
            . 'kepada siswa bernama ' . $studentName
            . 'kelas ' . $className;
    }
}
