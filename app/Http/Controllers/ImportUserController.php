<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportUserRequest;
use App\Services\User\UserService;
use Illuminate\Http\RedirectResponse;

class ImportUserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {}

    public function store(ImportUserRequest $request): RedirectResponse
    {
        $this->userService->importUser($request->file('excel-file'));

        return redirect()->route('users.index')
                ->with('success', 'Berhasil mengimpor data');
    }
}
