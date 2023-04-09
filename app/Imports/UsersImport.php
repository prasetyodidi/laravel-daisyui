<?php

namespace App\Imports;

use App\Models\User;
use App\Services\User\UserService;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::query()->create([
            'name' => $row[0],
            'username' => $row[1],
            'email' => $row[2],
            'password' => bcrypt( $row[3])
        ]);

        $user->assignRole('teacher');

        return $user;
    }
}
