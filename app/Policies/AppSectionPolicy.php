<?php

namespace App\Policies;

use App\Models\AppSection;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppSectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the appSection can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list appsections');
    }

    /**
     * Determine whether the appSection can view the model.
     */
    public function view(User $user, AppSection $model): bool
    {
        return $user->hasPermissionTo('view appsections');
    }

    /**
     * Determine whether the appSection can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create appsections');
    }

    /**
     * Determine whether the appSection can update the model.
     */
    public function update(User $user, AppSection $model): bool
    {
        return $user->hasPermissionTo('update appsections');
    }

    /**
     * Determine whether the appSection can delete the model.
     */
    public function delete(User $user, AppSection $model): bool
    {
        return $user->hasPermissionTo('delete appsections');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete appsections');
    }

    /**
     * Determine whether the appSection can restore the model.
     */
    public function restore(User $user, AppSection $model): bool
    {
        return false;
    }

    /**
     * Determine whether the appSection can permanently delete the model.
     */
    public function forceDelete(User $user, AppSection $model): bool
    {
        return false;
    }
}
