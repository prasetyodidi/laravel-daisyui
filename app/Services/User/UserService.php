<?php

namespace App\Services\User;

use Illuminate\Http\UploadedFile;
use LaravelEasyRepository\BaseService;

interface UserService extends BaseService
{

    public function findByEmail(string $email);

    public function importUser(UploadedFile|string $fileLocation);

}
