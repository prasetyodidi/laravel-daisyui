<?php

namespace App\Policies;

use App\Models\AchievementType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AchievementTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('List Achievement Types');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AchievementType $achievementType): bool
    {
        return $user->hasPermissionTo('View Achievement Type');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Achievement Type');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AchievementType $achievementType): bool
    {
        return $user->hasPermissionTo('Update Achievement Type');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AchievementType $achievementType): bool
    {
        return $user->hasPermissionTo('Delete Achievement Type');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AchievementType $achievementType): bool
    {
        return $user->hasPermissionTo('Restore Achievement Type');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AchievementType $achievementType): bool
    {
        return $user->hasPermissionTo('Force Delete Achievement Type');

    }
}
