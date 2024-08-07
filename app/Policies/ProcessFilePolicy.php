<?php

namespace App\Policies;

use App\Models\ProcessFile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcessFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the processFile can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list processfiles');
    }

    /**
     * Determine whether the processFile can view the model.
     */
    public function view(User $user, ProcessFile $model): bool
    {
        return $user->hasPermissionTo('view processfiles');
    }

    /**
     * Determine whether the processFile can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create processfiles');
    }

    /**
     * Determine whether the processFile can update the model.
     */
    public function update(User $user, ProcessFile $model): bool
    {
        return $user->hasPermissionTo('update processfiles');
    }

    /**
     * Determine whether the processFile can delete the model.
     */
    public function delete(User $user, ProcessFile $model): bool
    {
        return $user->hasPermissionTo('delete processfiles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete processfiles');
    }

    /**
     * Determine whether the processFile can restore the model.
     */
    public function restore(User $user, ProcessFile $model): bool
    {
        return false;
    }

    /**
     * Determine whether the processFile can permanently delete the model.
     */
    public function forceDelete(User $user, ProcessFile $model): bool
    {
        return false;
    }
}
