<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentAchievement;
use App\Models\StudentClass;
use App\Models\StudentViolation;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            ViolationTypeSeeder::class,
            ViolationSeeder::class,
            AchievementTypeSeeder::class,
            AchievementSeeder::class,
            PointConditionSeeder::class,
        ]);

        $teacherIds = $this->generateIds(20);

        foreach ($teacherIds as $teacherId) {

            $teacher = User::factory()->create([
                'id' => $teacherId,
                'employee_id_number' => fake()->numerify('#############'),
                'subject' => fake()->word
            ]);

            $teacher->assignRole('teacher');

            $this->command->info('Users created.');

            $studentClass = StudentClass::factory()->create([
                'homeroom_teachers_id' => $teacherId
            ]);
            $this->command->info('Student Classes created.');

            $students = Student::factory(30)->create([
               'classes_id' => $studentClass->id,
            ]);
            $this->command->info('Students created.');

            $this->seedStudentViolation($teacherId, $students);
            $this->command->info('Student Violations created.');

            $this->seedStudentAchievement($teacherId, $students);
            $this->command->info('Student Achievements created.');
        }
    }


    private function seedStudentViolation(string $teacherId, Collection $students): void
    {
        foreach ($students as $student) {
            StudentViolation::factory(fake()->numberBetween(0, 5))->create([
                'students_id' => $student->id,
                'reported_by' => $teacherId
            ]);
        }
    }

    private function seedStudentAchievement(string $teacherId, Collection $students): void
    {
        foreach ($students as $student) {
            StudentAchievement::factory(fake()->numberBetween(0, 10))->create([
                'students_id' => $student->id,
                'reported_by' => $teacherId
            ]);
        }
    }

    private function generateIds(int $total): array
    {
        $ids = [];
        for ($i = 0; $i < $total; $i++) {
            $ids[] = fake()->uuid;
        }
        return $ids;
    }
}
