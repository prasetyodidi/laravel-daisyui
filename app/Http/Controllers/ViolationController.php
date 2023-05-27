<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViolationRequest;
use App\Http\Requests\UpdateViolationRequest;
use App\Models\Violation;
use App\Models\ViolationType;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ViolationController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Violation::class);
    }

    public function index(): View
    {
        $violations = Violation::with('violationType')->orderBy('created_at', 'desc')->paginate(10);

        return View('violation.index', compact('violations'));
    }

    public function create(): View
    {
        $violationTypes = ViolationType::pluck('violation_type_name', 'id');

        return View('violation.create', compact('violationTypes'));
    }

    public function store(StoreViolationRequest $request): RedirectResponse
    {
        try {
            $data = [
                'violation_name' => $request->input('violation_name'),
                'violation_point' => $request->input('violation_point'),
                'violation_types_id' => $request->input('violation_type'),
            ];

            Violation::query()->create($data);

            return redirect()->route('violations.index')->with('success', 'Berhasil menambahkan pelanggaran baru');
        } catch (Exception $exception) {
            return redirect()->route('violations.index')->with('fail', 'Gagal menambahkan pelanggaran baru');
        }
    }

    public function show(Violation $violation): View
    {
        return View('violation.show', compact('violation'));
    }

    public function edit(Violation $violation): View
    {
        $violationTypes = ViolationType::pluck('violation_type_name', 'id');

        return View('violation.edit', compact('violation', 'violationTypes'));
    }

    public function update(UpdateViolationRequest $request, Violation $violation): RedirectResponse
    {
        try {
            $data = [
                'violation_name' => $request->input('violation_name'),
                'violation_point' => $request->input('violation_point'),
                'violation_types_id' => $request->input('violation_type'),
            ];

            $violation->update($data);

            return redirect()->route('violations.index')->with('success', 'Berhasil mengubah pelanggaran');
        } catch (Exception $exception) {
            return redirect()->route('violations.index')->with('fail', 'Gagal mengubah pelanggaran');
        }
    }

    public function destroy(Violation $violation): RedirectResponse
    {
        try {
            $violation->delete();

            return redirect()->route('violations.index')->with('success', 'Berhasil menghapus pelanggaran');
        } catch (Exception $exception) {
            return redirect()->route('violations.index')->with('fail', 'Gagal menghapus pelanggaran');
        }
    }
}
