<?php

namespace App\Services\User;

use App\Imports\UsersImport;
use Illuminate\Http\UploadedFile;
use LaravelEasyRepository\Service;
use App\Repositories\User\UserRepository;
use Maatwebsite\Excel\Facades\Excel;

class UserServiceImplement extends Service implements UserService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;
     private $importUser;

    public function __construct(UserRepository $mainRepository, UsersImport $usersImport)
    {
      $this->mainRepository = $mainRepository;
      $this->importUser = $usersImport;
    }

    public function findByEmail(string $email)
    {
        return $this->findByEmail($email);
    }

    public function importUser(string|UploadedFile $fileLocation): void
    {
        Excel::import($this->importUser, $fileLocation);
    }
}
