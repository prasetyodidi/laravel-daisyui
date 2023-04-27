<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportTeacherRequest;
use App\Imports\TeachersImport;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ImportTeacherController extends Controller
{
    public function store(ImportTeacherRequest $request): RedirectResponse
    {
        $teacherImport = new TeachersImport();

        try {
            Excel::import($teacherImport, $request->file('excel-file'));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($teacherImport->errors());
        } finally {
            return redirect()->route('teacher.index')
                ->with('success', 'Berhasil mengimpor data');
        }
    }
}
