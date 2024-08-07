<?php

namespace App\Policies;

use App\Models\Process;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the process can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list processes');
    }

    /**
     * Determine whether the process can view the model.
     */
    public function view(User $user, Process $model): bool
    {
        return $user->hasPermissionTo('view processes');
    }

    /**
     * Determine whether the process can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create processes');
    }

    /**
     * Determine whether the process can update the model.
     */
    public function update(User $user, Process $model): bool
    {
        return $user->hasPermissionTo('update processes');
    }

    /**
     * Determine whether the process can delete the model.
     */
    public function delete(User $user, Process $model): bool
    {
        return $user->hasPermissionTo('delete processes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete processes');
    }

    /**
     * Determine whether the process can restore the model.
     */
    public function restore(User $user, Process $model): bool
    {
        return false;
    }

    /**
     * Determine whether the process can permanently delete the model.
     */
    public function forceDelete(User $user, Process $model): bool
    {
        return false;
    }
}
