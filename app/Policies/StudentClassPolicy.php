<?php

namespace App\Policies;

use App\Models\StudentClass;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentClassPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('List Student Classes');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StudentClass $studentClass): bool
    {
        return $user->hasPermissionTo('View Student Class');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Student Class');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudentClass $studentClass): bool
    {
        return $user->hasPermissionTo('Update Student Class');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudentClass $studentClass): bool
    {
        return $user->hasPermissionTo('Delete Student Class');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StudentClass $studentClass): bool
    {
        return $user->hasPermissionTo('Restore Student Class');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StudentClass $studentClass): bool
    {
        return $user->hasPermissionTo('Force Delete Student Class');

    }
}
