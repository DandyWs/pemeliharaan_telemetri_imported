<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JenisPeralatan;
use Illuminate\Auth\Access\HandlesAuthorization;

class JenisPeralatanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jenisPeralatan can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the jenisPeralatan can view the model.
     */
    public function view(User $user, JenisPeralatan $model): bool
    {
        return true;
    }

    /**
     * Determine whether the jenisPeralatan can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the jenisPeralatan can update the model.
     */
    public function update(User $user, JenisPeralatan $model): bool
    {
        return true;
    }

    /**
     * Determine whether the jenisPeralatan can delete the model.
     */
    public function delete(User $user, JenisPeralatan $model): bool
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
     * Determine whether the jenisPeralatan can restore the model.
     */
    public function restore(User $user, JenisPeralatan $model): bool
    {
        return false;
    }

    /**
     * Determine whether the jenisPeralatan can permanently delete the model.
     */
    public function forceDelete(User $user, JenisPeralatan $model): bool
    {
        return false;
    }
}
