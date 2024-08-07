<?php

namespace App\Policies;

use App\Models\PhraseCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhraseCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the phraseCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list phrasecategories');
    }

    /**
     * Determine whether the phraseCategory can view the model.
     */
    public function view(User $user, PhraseCategory $model): bool
    {
        return $user->hasPermissionTo('view phrasecategories');
    }

    /**
     * Determine whether the phraseCategory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create phrasecategories');
    }

    /**
     * Determine whether the phraseCategory can update the model.
     */
    public function update(User $user, PhraseCategory $model): bool
    {
        return $user->hasPermissionTo('update phrasecategories');
    }

    /**
     * Determine whether the phraseCategory can delete the model.
     */
    public function delete(User $user, PhraseCategory $model): bool
    {
        return $user->hasPermissionTo('delete phrasecategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete phrasecategories');
    }

    /**
     * Determine whether the phraseCategory can restore the model.
     */
    public function restore(User $user, PhraseCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the phraseCategory can permanently delete the model.
     */
    public function forceDelete(User $user, PhraseCategory $model): bool
    {
        return false;
    }
}
