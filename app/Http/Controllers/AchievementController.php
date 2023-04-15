<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchievementRequest;
use App\Http\Requests\UpdateAchievementRequest;
use App\Models\Achievement;
use App\Models\AchievementType;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AchievementController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Achievement::class);
    }

    public function index(): View
    {
        $achievements = Achievement::with('achievementType')->orderBy('created_at', 'desc')->paginate(10);

        return View('achievement.index', compact('achievements'));
    }

    public function create(): View
    {
        $achievementTypes = AchievementType::pluck('achievement_type_name', 'id');

        return View('achievement.create', compact('achievementTypes'));
    }

    public function store(StoreAchievementRequest $request): RedirectResponse
    {
        try {
            $data = [
                'achievement_name' => $request->input('achievement-name'),
                'achievement_point' => $request->input('achievement-point'),
                'achievement_types_id' => $request->input('achievement-type'),
            ];

            Achievement::query()->create($data);

            return redirect()->route('achievements.index')->with('success', 'Berhasil menambahkan pencapaian baru');
        } catch (Exception $exception) {
            return redirect()->route('achievements.index')->with('fail', 'Gagal menambahkan pencapaian baru');
        }
    }

    public function show(Achievement $achievement): View
    {
        return View('achievement.show', compact('achievement'));
    }

    public function edit(Achievement $achievement): View
    {
        $achievementTypes = AchievementType::pluck('achievement_type_name', 'id');

        return View('achievement.edit', compact('achievement', 'achievementTypes'));
    }

    public function update(UpdateAchievementRequest $request, Achievement $achievement): RedirectResponse
    {
        try {
            $data = [
                'achievement_name' => $request->input('achievement-name'),
                'achievement_point' => $request->input('achievement-point'),
                'achievement_types_id' => $request->input('achievement-type'),
            ];

            $achievement->update($data);

            return redirect()->route('achievements.index')->with('success', 'Berhasil mengubah pencapaian');
        } catch (Exception $exception) {
            return redirect()->route('achievements.index')->with('fail', 'Gagal mengubah pencapaian');
        }
    }

    public function destroy(Achievement $achievement): RedirectResponse
    {
        try {
            $achievement->delete();

            return redirect()->route('achievements.index')->with('success', 'Berhasil menghapus pencapaian');
        } catch (Exception $exception) {
            return redirect()->route('achievements.index')->with('fail', 'Gagal menghapus pencapaian');
        }
    }
}
