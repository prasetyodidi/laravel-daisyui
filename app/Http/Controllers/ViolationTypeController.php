<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViolationTypeRequest;
use App\Http\Requests\UpdateViolationTypeRequest;
use App\Models\ViolationType;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ViolationTypeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(ViolationType::class);
    }

    public function index(): View
    {
        $violationTypes = ViolationType::paginate(10);

        return View('violation-type.index', compact('violationTypes'));
    }

    public function create(): View
    {
        return View('violation-type.create');
    }

    public function store(StoreViolationTypeRequest $request): RedirectResponse
    {
        try {
            $data = [
                'violation_type_name' => $request->input('violation-type-name')
            ];

            ViolationType::query()->create($data);

            return redirect()
                ->route('violation-types.index')
                ->with('success', 'Berhasil manambahkan jenis pelanggaran');
        } catch (Exception) {
            return redirect()
                ->route('violation-types.index')
                ->with('fail', 'Gagal manambahkan jenis pelanggaran');
        }
    }

    public function show(ViolationType $violationType): View
    {
        return View('violation-type.show', compact('violationType'));
    }

    public function edit(ViolationType $violationType): View
    {
        return View('violation-type.edit', compact('violationType'));
    }

    public function update(UpdateViolationTypeRequest $request, ViolationType $violationType): RedirectResponse
    {
        try {
            $data = [
                'violation_type_name' => $request->input('violation-type-name')
            ];

            $violationType->update($data);

            return redirect()
                ->route('violation-types.index')
                ->with('success', 'Berhasil mengubah jenis pelanggaran');
        } catch (Exception) {
            return redirect()
                ->route('violation-types.index')
                ->with('fail', 'Gagal mengubah jenis pelanggaran');
        }
    }

    public function destroy(ViolationType $violationType): RedirectResponse
    {
        try {
            $violationType->delete();

            return redirect()
                ->route('violation-types.index')
                ->with('success', 'Berhasil menghapus jenis pelanggaran');
        } catch (Exception) {
            return redirect()
                ->route('violation-types.index')
                ->with('fail', 'Gagal menghapus jenis pelanggaran');
        }
    }
}
