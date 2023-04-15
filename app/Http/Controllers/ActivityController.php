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
        $this->authorizeResource(ActivityController::class);
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }

    private function transformStudentRecordToActivity($violationName, $point, $studentName, $className): string
    {
        return 'berhasil menambahkan pelanggaran ' . $violationName
            . 'dengan point ' . $point
            . 'kepada siswa bernama ' . $studentName
            . 'kelas ' . $className;
    }
}
