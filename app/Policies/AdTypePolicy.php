<?php

namespace App\Policies;

use App\Models\AdType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the adType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list adtypes');
    }

    /**
     * Determine whether the adType can view the model.
     */
    public function view(User $user, AdType $model): bool
    {
        return $user->hasPermissionTo('view adtypes');
    }

    /**
     * Determine whether the adType can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create adtypes');
    }

    /**
     * Determine whether the adType can update the model.
     */
    public function update(User $user, AdType $model): bool
    {
        return $user->hasPermissionTo('update adtypes');
    }

    /**
     * Determine whether the adType can delete the model.
     */
    public function delete(User $user, AdType $model): bool
    {
        return $user->hasPermissionTo('delete adtypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete adtypes');
    }

    /**
     * Determine whether the adType can restore the model.
     */
    public function restore(User $user, AdType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the adType can permanently delete the model.
     */
    public function forceDelete(User $user, AdType $model): bool
    {
        return false;
    }
}
