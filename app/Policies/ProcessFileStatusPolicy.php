<?php

namespace App\Policies;

use App\Models\ProcessFileStatus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcessFileStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the processFileStatus can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list processfilestatuses');
    }

    /**
     * Determine whether the processFileStatus can view the model.
     */
    public function view(User $user, ProcessFileStatus $model): bool
    {
        return $user->hasPermissionTo('view processfilestatuses');
    }

    /**
     * Determine whether the processFileStatus can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create processfilestatuses');
    }

    /**
     * Determine whether the processFileStatus can update the model.
     */
    public function update(User $user, ProcessFileStatus $model): bool
    {
        return $user->hasPermissionTo('update processfilestatuses');
    }

    /**
     * Determine whether the processFileStatus can delete the model.
     */
    public function delete(User $user, ProcessFileStatus $model): bool
    {
        return $user->hasPermissionTo('delete processfilestatuses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete processfilestatuses');
    }

    /**
     * Determine whether the processFileStatus can restore the model.
     */
    public function restore(User $user, ProcessFileStatus $model): bool
    {
        return false;
    }

    /**
     * Determine whether the processFileStatus can permanently delete the model.
     */
    public function forceDelete(User $user, ProcessFileStatus $model): bool
    {
        return false;
    }
}
