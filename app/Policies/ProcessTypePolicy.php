<?php

namespace App\Policies;

use App\Models\ProcessType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcessTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the processType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list processtypes');
    }

    /**
     * Determine whether the processType can view the model.
     */
    public function view(User $user, ProcessType $model): bool
    {
        return $user->hasPermissionTo('view processtypes');
    }

    /**
     * Determine whether the processType can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create processtypes');
    }

    /**
     * Determine whether the processType can update the model.
     */
    public function update(User $user, ProcessType $model): bool
    {
        return $user->hasPermissionTo('update processtypes');
    }

    /**
     * Determine whether the processType can delete the model.
     */
    public function delete(User $user, ProcessType $model): bool
    {
        return $user->hasPermissionTo('delete processtypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete processtypes');
    }

    /**
     * Determine whether the processType can restore the model.
     */
    public function restore(User $user, ProcessType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the processType can permanently delete the model.
     */
    public function forceDelete(User $user, ProcessType $model): bool
    {
        return false;
    }
}
