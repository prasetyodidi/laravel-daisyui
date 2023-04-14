<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportUserRequest;
use App\Services\User\UserService;
use \Illuminate\Contracts\View\View;

class ImportUserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {}

    public function store(ImportUserRequest $request): View
    {
        $this->userService->importUser($request->file('excel-file'));

        $users = $this->userService->all();

        return View('user.index', compact('users'))
                ->with('success', 'Berhasil mengimport data');
    }
}
