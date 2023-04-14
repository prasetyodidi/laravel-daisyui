<?php

namespace App\Policies;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AchievementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('List Achievements');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Achievement $achievement): bool
    {
        return $user->hasPermissionTo('View Achievement');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Achievement');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Achievement $achievement): bool
    {
        return $user->hasPermissionTo('Update Achievement');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Achievement $achievement): bool
    {
        return $user->hasPermissionTo('Delete Achievement');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Achievement $achievement): bool
    {
        return $user->hasPermissionTo('Restore Achievement');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Achievement $achievement): bool
    {
        return $user->hasPermissionTo('Force Delete Achievement');

    }
}
