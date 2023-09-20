<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StoreSetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoreSettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the storeSetting can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list storesettings');
    }

    /**
     * Determine whether the storeSetting can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StoreSetting  $model
     * @return mixed
     */
    public function view(User $user, StoreSetting $model)
    {
        return $user->hasPermissionTo('view storesettings');
    }

    /**
     * Determine whether the storeSetting can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create storesettings');
    }

    /**
     * Determine whether the storeSetting can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StoreSetting  $model
     * @return mixed
     */
    public function update(User $user, StoreSetting $model)
    {
        return $user->hasPermissionTo('update storesettings');
    }

    /**
     * Determine whether the storeSetting can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StoreSetting  $model
     * @return mixed
     */
    public function delete(User $user, StoreSetting $model)
    {
        return $user->hasPermissionTo('delete storesettings');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StoreSetting  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete storesettings');
    }

    /**
     * Determine whether the storeSetting can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StoreSetting  $model
     * @return mixed
     */
    public function restore(User $user, StoreSetting $model)
    {
        return false;
    }

    /**
     * Determine whether the storeSetting can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StoreSetting  $model
     * @return mixed
     */
    public function forceDelete(User $user, StoreSetting $model)
    {
        return false;
    }
}
