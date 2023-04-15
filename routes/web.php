<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AchievementTypeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportUserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PointConditionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentAchievementController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentViolationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ViolationTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('users', UserController::class);
Route::post('/users/import', [ImportUserController::class, 'store'])->name('user.import');

Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::resource('achievements', AchievementController::class);
Route::resource('achievement-types', AchievementTypeController::class);
Route::resource('point-conditions', PointConditionController::class);
Route::resource('student-achievements', StudentAchievementController::class);
Route::resource('student-classes', StudentClassController::class);
Route::resource('students', StudentController::class);
Route::resource('student-violations', StudentViolationController::class);
Route::resource('violations', ViolationController::class);
Route::resource('violation-types', ViolationTypeController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('activities', ActivityController::class);

require __DIR__.'/auth.php';
