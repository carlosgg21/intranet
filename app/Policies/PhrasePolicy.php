<?php

namespace App\Policies;

use App\Models\Phrase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhrasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the phrase can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list phrases');
    }

    /**
     * Determine whether the phrase can view the model.
     */
    public function view(User $user, Phrase $model): bool
    {
        return $user->hasPermissionTo('view phrases');
    }

    /**
     * Determine whether the phrase can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create phrases');
    }

    /**
     * Determine whether the phrase can update the model.
     */
    public function update(User $user, Phrase $model): bool
    {
        return $user->hasPermissionTo('update phrases');
    }

    /**
     * Determine whether the phrase can delete the model.
     */
    public function delete(User $user, Phrase $model): bool
    {
        return $user->hasPermissionTo('delete phrases');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete phrases');
    }

    /**
     * Determine whether the phrase can restore the model.
     */
    public function restore(User $user, Phrase $model): bool
    {
        return false;
    }

    /**
     * Determine whether the phrase can permanently delete the model.
     */
    public function forceDelete(User $user, Phrase $model): bool
    {
        return false;
    }
}
