<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UiSetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class UiSettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the uiSetting can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list uisettings');
    }

    /**
     * Determine whether the uiSetting can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UiSetting  $model
     * @return mixed
     */
    public function view(User $user, UiSetting $model)
    {
        return $user->hasPermissionTo('view uisettings');
    }

    /**
     * Determine whether the uiSetting can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create uisettings');
    }

    /**
     * Determine whether the uiSetting can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UiSetting  $model
     * @return mixed
     */
    public function update(User $user, UiSetting $model)
    {
        return $user->hasPermissionTo('update uisettings');
    }

    /**
     * Determine whether the uiSetting can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UiSetting  $model
     * @return mixed
     */
    public function delete(User $user, UiSetting $model)
    {
        return $user->hasPermissionTo('delete uisettings');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UiSetting  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete uisettings');
    }

    /**
     * Determine whether the uiSetting can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UiSetting  $model
     * @return mixed
     */
    public function restore(User $user, UiSetting $model)
    {
        return false;
    }

    /**
     * Determine whether the uiSetting can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UiSetting  $model
     * @return mixed
     */
    public function forceDelete(User $user, UiSetting $model)
    {
        return false;
    }
}
