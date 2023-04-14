<?php

namespace App\Policies;

use App\Models\StudentAchievement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentAchievementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('List Student Achievements');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StudentAchievement $studentAchievement): bool
    {
        return $user->hasPermissionTo('View Student Achievement');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Student Achievement');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudentAchievement $studentAchievement): bool
    {
        return $user->hasPermissionTo('Update Student Achievement');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudentAchievement $studentAchievement): bool
    {
        return $user->hasPermissionTo('Delete Student Achievement');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StudentAchievement $studentAchievement): bool
    {
        return $user->hasPermissionTo('Restore Student Achievement');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StudentAchievement $studentAchievement): bool
    {
        return $user->hasPermissionTo('Force Delete Student Achievement');

    }
}
