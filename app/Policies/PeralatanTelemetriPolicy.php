<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PeralatanTelemetri;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeralatanTelemetriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the peralatanTelemetri can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the peralatanTelemetri can view the model.
     */
    public function view(User $user, PeralatanTelemetri $model): bool
    {
        return true;
    }

    /**
     * Determine whether the peralatanTelemetri can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the peralatanTelemetri can update the model.
     */
    public function update(User $user, PeralatanTelemetri $model): bool
    {
        return true;
    }

    /**
     * Determine whether the peralatanTelemetri can delete the model.
     */
    public function delete(User $user, PeralatanTelemetri $model): bool
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
     * Determine whether the peralatanTelemetri can restore the model.
     */
    public function restore(User $user, PeralatanTelemetri $model): bool
    {
        return false;
    }

    /**
     * Determine whether the peralatanTelemetri can permanently delete the model.
     */
    public function forceDelete(User $user, PeralatanTelemetri $model): bool
    {
        return false;
    }
}
