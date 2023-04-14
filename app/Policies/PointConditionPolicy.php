<?php

namespace App\Policies;

use App\Models\PointCondition;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PointConditionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('List Point Conditions');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PointCondition $pointCondition): bool
    {
        return $user->hasPermissionTo('View Point Condition');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Point Condition');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PointCondition $pointCondition): bool
    {
        return $user->hasPermissionTo('Update Point Condition');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PointCondition $pointCondition): bool
    {
        return $user->hasPermissionTo('Delete Point Condition');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PointCondition $pointCondition): bool
    {
        return $user->hasPermissionTo('Restore Point Condition');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PointCondition $pointCondition): bool
    {
        return $user->hasPermissionTo('Force Delete Point Condition');

    }
}
