<?php

namespace App\Imports;

use App\Enums\Gender;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsImport implements ToModel, WithStartRow, SkipsOnError
{
    use SkipsErrors;
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        $name = $row[0];
        $studentId = $row[1];
        $className = $row[2];
        $gender = $row[3];
        $address = $row[4];

        $gender = Gender::fromIndonesia($gender);

        $studentClassId = StudentClass::query()
            ->where('class_name', '=', $className)
            ->first()->id;

        $data = [
            'name' => $name,
            'classes_id' => $studentClassId,
            'student_id_number' => $studentId,
            'address' => $address,
            'gender' => $gender->value
        ];

        return new Student($data);
    }

    public function startRow(): int
    {
        return 2;
    }

}
