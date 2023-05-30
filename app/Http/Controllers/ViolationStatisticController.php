<?php

namespace App\Http\Controllers;

use App\Models\StudentViolation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ViolationStatisticController extends Controller
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
        $query = StudentViolation::query();
        $query->selectRaw('count(*) total, day(violated_at) day');
        $query->whereRaw('month(violated_at) = ' . $month . ' and year(violated_at) = ' . $year);
        $query->groupByRaw('day(violated_at)');
        $queryResult = $query->get()->pluck('total', 'day');

        $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $response = [];
        for ($i = 1; $i <= $totalDays; $i++) {
            $response['days'][] = $i;
            $response['values'][] = $queryResult[$i] ?? 0;
        }
        $response['info'] = "Bulan $month, $year";

        return response()->json($response);
    }
}
