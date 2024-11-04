<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pemeliharaan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PemeliharaanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pemeliharaan can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the pemeliharaan can view the model.
     */
    public function view(User $user, Pemeliharaan $model): bool
    {
        return true;
    }

    /**
     * Determine whether the pemeliharaan can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the pemeliharaan can update the model.
     */
    public function update(User $user, Pemeliharaan $model): bool
    {
        return true;
    }

    /**
     * Determine whether the pemeliharaan can delete the model.
     */
    public function delete(User $user, Pemeliharaan $model): bool
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
     * Determine whether the pemeliharaan can restore the model.
     */
    public function restore(User $user, Pemeliharaan $model): bool
    {
        return false;
    }

    /**
     * Determine whether the pemeliharaan can permanently delete the model.
     */
    public function forceDelete(User $user, Pemeliharaan $model): bool
    {
        return false;
    }
}
