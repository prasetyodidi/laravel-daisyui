<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
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

    public function run(): void
    {
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $teacher = Role::firstOrCreate(['name' => 'Teacher']);

        foreach ($this->modules as $module) {
            $plural = Str::plural($module);
            $singular = $module;

            foreach ($this->pluralActions as $action) {
                Permission::firstOrCreate([
                    'name' => "$action $plural"
                ]);
            }

            foreach ($this->singularActions as $action) {
                Permission::firstOrCreate([
                    'name' => "$action $singular"
                ]);
            }
        }

        $superAdmin->syncPermissions(Permission::all()->pluck('name')->toArray());

        $permissions = [
            'List Point Conditions',
            'List Student Classes',
            'List Students',
            'List Student Violations',
            'List Teachers',
            'List Violations',
            'List Violation Types',
        ];
        $admin->syncPermissions($permissions);

        $permissions = [
            'List Activities',
            'List Students',
            'List Violations'
        ];
        $teacher->syncPermissions($permissions);
    }
}
