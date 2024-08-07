<?php

namespace App\Policies;

use App\Models\OtherApp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OtherAppPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the otherApp can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list otherapps');
    }

    /**
     * Determine whether the otherApp can view the model.
     */
    public function view(User $user, OtherApp $model): bool
    {
        return $user->hasPermissionTo('view otherapps');
    }

    /**
     * Determine whether the otherApp can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create otherapps');
    }

    /**
     * Determine whether the otherApp can update the model.
     */
    public function update(User $user, OtherApp $model): bool
    {
        return $user->hasPermissionTo('update otherapps');
    }

    /**
     * Determine whether the otherApp can delete the model.
     */
    public function delete(User $user, OtherApp $model): bool
    {
        return $user->hasPermissionTo('delete otherapps');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete otherapps');
    }

    /**
     * Determine whether the otherApp can restore the model.
     */
    public function restore(User $user, OtherApp $model): bool
    {
        return false;
    }

    /**
     * Determine whether the otherApp can permanently delete the model.
     */
    public function forceDelete(User $user, OtherApp $model): bool
    {
        return false;
    }
}
