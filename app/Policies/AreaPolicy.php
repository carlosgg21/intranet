<?php

namespace App\Policies;

use App\Models\Area;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AreaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the area can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list areas');
    }

    /**
     * Determine whether the area can view the model.
     */
    public function view(User $user, Area $model): bool
    {
        return $user->hasPermissionTo('view areas');
    }

    /**
     * Determine whether the area can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create areas');
    }

    /**
     * Determine whether the area can update the model.
     */
    public function update(User $user, Area $model): bool
    {
        return $user->hasPermissionTo('update areas');
    }

    /**
     * Determine whether the area can delete the model.
     */
    public function delete(User $user, Area $model): bool
    {
        return $user->hasPermissionTo('delete areas');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete areas');
    }

    /**
     * Determine whether the area can restore the model.
     */
    public function restore(User $user, Area $model): bool
    {
        return false;
    }

    /**
     * Determine whether the area can permanently delete the model.
     */
    public function forceDelete(User $user, Area $model): bool
    {
        return false;
    }
}
