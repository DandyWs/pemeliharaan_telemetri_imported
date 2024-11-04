<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Komponen;
use Illuminate\Auth\Access\HandlesAuthorization;

class KomponenPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the komponen can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the komponen can view the model.
     */
    public function view(User $user, Komponen $model): bool
    {
        return true;
    }

    /**
     * Determine whether the komponen can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the komponen can update the model.
     */
    public function update(User $user, Komponen $model): bool
    {
        return true;
    }

    /**
     * Determine whether the komponen can delete the model.
     */
    public function delete(User $user, Komponen $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the komponen can restore the model.
     */
    public function restore(User $user, Komponen $model): bool
    {
        return false;
    }

    /**
     * Determine whether the komponen can permanently delete the model.
     */
    public function forceDelete(User $user, Komponen $model): bool
    {
        return false;
    }
}
