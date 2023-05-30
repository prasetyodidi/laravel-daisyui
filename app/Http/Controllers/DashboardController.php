<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = date('F', mktime(0, 0, 0, $i, 10));
        }
        $years = [];
        $currentYear = date('Y');
        for ($i = 2015; $i <= $currentYear; $i++) {
            $years[$i] = $i;
        }
        return View('dashboard.statistic', compact('months', 'years'));
    }
}
