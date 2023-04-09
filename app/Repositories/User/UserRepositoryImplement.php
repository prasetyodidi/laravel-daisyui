<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository
{

    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findByEmail(string $email)
    {
        return $this->model->newQuery()->where('email', $email)->first();
    }
}
