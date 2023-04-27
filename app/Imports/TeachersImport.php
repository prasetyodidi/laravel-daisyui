<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Throwable;

class TeachersImport implements ToModel, WithStartRow, SkipsOnError
{
    use SkipsErrors;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $name = $row[0];
        $username = $row[1];
        $email = $row[2];
        $employeeId = $row[3];
        $password = $row[4];
        $subject = $row[5];

        $data = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'username' => $username,
            'password' => bcrypt($password),
            'employee_id_number' => $employeeId,
        ];

        $teacher = User::factory()->create($data);

        $teacher->assignRole('teacher');

        return $teacher;
    }

    public function startRow(): int
    {
        return 2;
    }
}
