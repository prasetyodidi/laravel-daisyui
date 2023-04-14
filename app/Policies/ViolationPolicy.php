<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Violation;
use Illuminate\Auth\Access\Response;

class ViolationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('List Violations');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Violation $violation): bool
    {
        return $user->hasPermissionTo('View Violation');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Violation');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Violation $violation): bool
    {
        return $user->hasPermissionTo('Update Violation');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Violation $violation): bool
    {
        return $user->hasPermissionTo('Delete Violation');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Violation $violation): bool
    {
        return $user->hasPermissionTo('Restore Violation');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Violation $violation): bool
    {
        return $user->hasPermissionTo('Force Delete Violation');

    }
}
