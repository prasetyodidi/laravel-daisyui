<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportStudentRequest;
use App\Imports\StudentsImport;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ImportStudentController extends Controller
{
    public function store(ImportStudentRequest $request): RedirectResponse
    {
        $studentImport = new StudentsImport();

        try {
            Excel::import($studentImport, $request->file('excel-file'));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($studentImport->errors());
        } finally {
            return redirect()->route('students.index')
                ->with('success', 'Berhasil mengimpor data');
        }
    }
}
