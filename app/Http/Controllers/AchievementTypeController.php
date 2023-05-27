<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchievementTypeRequest;
use App\Http\Requests\UpdateAchievementTypeRequest;
use App\Models\AchievementType;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AchievementTypeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(AchievementType::class);
    }

    public function index(): View
    {
        $achievementTypes = AchievementType::paginate(10);

        return View('achievement-type.index', compact('achievementTypes'));
    }

    public function create(): View
    {
        return View('achievement-type.create');
    }

    public function store(StoreAchievementTypeRequest $request): RedirectResponse
    {
        try {
            $data = [
                'achievement_type_name' => $request->input('achievement_type_name')
            ];

            AchievementType::query()->create($data);

            return redirect()
                ->route('achievement-types.index')
                ->with('success', 'Berhasil manambahkan jenis pencapaian');
        } catch (Exception) {
            return redirect()
                ->route('achievement-types.index')
                ->with('fail', 'Gagal manambahkan jenis pencapaian');
        }
    }

    public function show(AchievementType $achievementType): View
    {
        return View('achievement-type.show', compact('achievementType'));
    }

    public function edit(AchievementType $achievementType): View
    {
        return View('achievement-type.edit', compact('achievementType'));
    }

    public function update(UpdateAchievementTypeRequest $request, AchievementType $achievementType): RedirectResponse
    {
        try {
            $data = [
                'achievement_type_name' => $request->input('achievement_type_name')
            ];

            $achievementType->update($data);

            return redirect()
                ->route('achievement-types.index')
                ->with('success', 'Berhasil mengubah jenis pencapaian');
        } catch (Exception) {
            return redirect()
                ->route('achievement-types.index')
                ->with('fail', 'Gagal mengubah jenis pencapaian');
        }
    }

    public function destroy(AchievementType $achievementType): RedirectResponse
    {
        try {
            $achievementType->delete();

            return redirect()
                ->route('achievement-types.index')
                ->with('success', 'Berhasil menghapus jenis pencapaian');
        } catch (Exception) {
            return redirect()
                ->route('achievement-types.index')
                ->with('fail', 'Gagal menghapus jenis pencapaian');
        }
    }
}
