<?php

namespace App\Policies;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the settings can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allsettings');
    }

    /**
     * Determine whether the settings can view the model.
     */
    public function view(User $user, Settings $model): bool
    {
        return $user->hasPermissionTo('view allsettings');
    }

    /**
     * Determine whether the settings can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allsettings');
    }

    /**
     * Determine whether the settings can update the model.
     */
    public function update(User $user, Settings $model): bool
    {
        return $user->hasPermissionTo('update allsettings');
    }

    /**
     * Determine whether the settings can delete the model.
     */
    public function delete(User $user, Settings $model): bool
    {
        return $user->hasPermissionTo('delete allsettings');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allsettings');
    }

    /**
     * Determine whether the settings can restore the model.
     */
    public function restore(User $user, Settings $model): bool
    {
        return false;
    }

    /**
     * Determine whether the settings can permanently delete the model.
     */
    public function forceDelete(User $user, Settings $model): bool
    {
        return false;
    }
}
