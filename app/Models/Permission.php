<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    private array $modules = [
        'Activity', 'Point Condition', 'Student', 'Student Class',
        'Teacher', 'User', 'Student Violation', 'Violation', 'Violation Type',
        'Role', 'Permission', 'Student Achievement', 'Achievement', 'Achievement Type', 'Admin'
    ];

    private array $pluralActions = [
        'List'
    ];

    private array $singularActions = [
        'View', 'Create', 'Update', 'Delete', 'Restore', 'Force Delete'
    ];

    public function listPermissions(): array
    {
        $result = [];

        foreach ($this->modules as $module) {
            $plural = Str::plural($module);
            $singular = $module;

            foreach ($this->pluralActions as $action) {
                $result[$module][] = "$action $plural";
            }

            foreach ($this->singularActions as $action) {
                $result[$module][] = "$action $singular";
            }
        }

        return $result;
    }
}
