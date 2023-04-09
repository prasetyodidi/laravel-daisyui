<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {
        $this->authorizeResource(User::class);
    }

    public function index(Request $request): View
    {
        $users = $this->userService->all();

        return View('user.index', compact('users'));
    }

    public function create(): View
    {
        return View('user.create');
    }

    public function store(StoreUserRequest $request): View
    {
        $user = $this->userService->create($request);

        $users = $this->userService->all();

        return View('user.index', compact('users'))
                ->with('success', 'Berhasil menambahkan user: ' . $user->name);
    }

    public function edit(Request $request, string $userId): View
    {
        $user = $this->userService->find($userId);

        return View('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $userId): View
    {
        $user = $this->userService->update($userId, $request);

        $users = $this->userService->all();

        return View('user.index', compact('users'))
            ->with('success', 'Berhasil mengubah user: ' . $user->name);
    }

    public function destroy(string $userId): View
    {
        $this->userService->delete($userId);

        $users = $this->userService->all();

        return View('user.index', compact('users'));
    }
}
