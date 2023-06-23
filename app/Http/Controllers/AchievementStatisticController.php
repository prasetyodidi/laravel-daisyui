<?php

namespace App\Http\Controllers;

use App\Models\StudentAchievement;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AchievementStatisticController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $month = date('m');
        $year = date('Y');
        $paramMonth = $request->query('month');
        $paramYear = $request->query('year');
        if ($paramMonth >= 1 && $paramMonth <= 12) {
            $month = $paramMonth;
        }
        if ($paramYear >= 1900 && $paramYear <= date('Y')) {
            $year = $paramYear;
        }
        $query = StudentAchievement::query();
        $query->selectRaw('count(*) total, day(achieved_at) day');
        $query->whereRaw('month(achieved_at) = ' . $month . ' and year(achieved_at) = ' . $year);
        $query->groupByRaw('day(achieved_at)');
        $queryResult = $query->get()->pluck('total', 'day');

        $totalDays = Carbon::parse("$year-$month")->daysInMonth;

        $response = [];
        for ($i = 1; $i <= $totalDays; $i++) {
            $response['days'][] = $i;
            $response['values'][] = $queryResult[$i] ?? 0;
        }
        $response['info'] = "Bulan $month, $year";

        return response()->json($response);
    }
}
