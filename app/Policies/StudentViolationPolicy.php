<?php

namespace App\Policies;

use App\Models\StudentViolation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentViolationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('List Student Violations');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StudentViolation $studentViolation): bool
    {
        return $user->hasPermissionTo('View Student Violation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Student Violation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudentViolation $studentViolation): bool
    {
        return $user->hasPermissionTo('Update Student Violation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudentViolation $studentViolation): bool
    {
        return $user->hasPermissionTo('Delete Student Violation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StudentViolation $studentViolation): bool
    {
        return $user->hasPermissionTo('Restore Student Violation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StudentViolation $studentViolation): bool
    {
        return $user->hasPermissionTo('Force Delete Student Violation');
    }
}
