<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the workGroup can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list workgroups');
    }

    /**
     * Determine whether the workGroup can view the model.
     */
    public function view(User $user, WorkGroup $model): bool
    {
        return $user->hasPermissionTo('view workgroups');
    }

    /**
     * Determine whether the workGroup can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create workgroups');
    }

    /**
     * Determine whether the workGroup can update the model.
     */
    public function update(User $user, WorkGroup $model): bool
    {
        return $user->hasPermissionTo('update workgroups');
    }

    /**
     * Determine whether the workGroup can delete the model.
     */
    public function delete(User $user, WorkGroup $model): bool
    {
        return $user->hasPermissionTo('delete workgroups');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete workgroups');
    }

    /**
     * Determine whether the workGroup can restore the model.
     */
    public function restore(User $user, WorkGroup $model): bool
    {
        return false;
    }

    /**
     * Determine whether the workGroup can permanently delete the model.
     */
    public function forceDelete(User $user, WorkGroup $model): bool
    {
        return false;
    }
}
