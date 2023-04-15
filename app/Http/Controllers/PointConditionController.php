<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePointConditionRequest;
use App\Http\Requests\UpdatePointConditionRequest;
use App\Models\PointCondition;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PointConditionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(PointCondition::class);
    }

    public function index(): View
    {
        $pointConditions = PointCondition::query()->orderBy('minimum_point')->paginate(10);

        return View('point-condition.index', compact('pointConditions'));
    }

    public function create(): View
    {
        return View('point-condition.create');
    }

    public function store(StorePointConditionRequest $request): RedirectResponse
    {
        try {
            $data = [
                'condition_name' => $request->input('condition-name'),
                'minimum_point' => $request->input('minimum-point'),
                'maximum_point' => $request->input('maximum-point'),
            ];

            PointCondition::query()->create($data);

            return redirect()->route('point-conditions.index')->with('success', 'Berhasil menambahkan ketentuan point');
        } catch (Exception $exception) {
            return redirect()->route('point-conditions.index')->with('fail', 'Gagal menambahkan ketentuan point');
        }
    }

    public function show(PointCondition $pointCondition): View
    {
        return View('point-condition.show', compact('pointCondition'));
    }

    public function edit(PointCondition $pointCondition): View
    {
        return View('point-condition.edit', compact('pointCondition'));
    }

    public function update(UpdatePointConditionRequest $request, PointCondition $pointCondition): RedirectResponse
    {
        try {
            $data = [
                'condition_name' => $request->input('condition-name'),
                'minimum_point' => $request->input('minimum-point'),
                'maximum_point' => $request->input('maximum-point'),
            ];

            $pointCondition->update($data);

            return redirect()->route('point-conditions.index')->with('success', 'Berhasil mengubah ketentuan point');
        } catch (Exception $exception) {
            return redirect()->route('point-conditions.index')->with('fail', 'Gagal mengubah ketentuan point');
        }
    }

    public function destroy(PointCondition $pointCondition): RedirectResponse
    {
        try {
            $pointCondition->delete();

            return redirect()->route('point-conditions.index')->with('success', 'Berhasil menghapus ketentuan point');
        } catch (Exception $exception) {
            return redirect()->route('point-conditions.index')->with('fail', 'Berhasil menghapus ketentuan point');
        }
    }
}
