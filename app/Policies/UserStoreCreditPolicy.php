<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserStoreCredit;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserStoreCreditPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the userStoreCredit can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list userstorecredits');
    }

    /**
     * Determine whether the userStoreCredit can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserStoreCredit  $model
     * @return mixed
     */
    public function view(User $user, UserStoreCredit $model)
    {
        return $user->hasPermissionTo('view userstorecredits');
    }

    /**
     * Determine whether the userStoreCredit can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create userstorecredits');
    }

    /**
     * Determine whether the userStoreCredit can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserStoreCredit  $model
     * @return mixed
     */
    public function update(User $user, UserStoreCredit $model)
    {
        return $user->hasPermissionTo('update userstorecredits');
    }

    /**
     * Determine whether the userStoreCredit can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserStoreCredit  $model
     * @return mixed
     */
    public function delete(User $user, UserStoreCredit $model)
    {
        return $user->hasPermissionTo('delete userstorecredits');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserStoreCredit  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete userstorecredits');
    }

    /**
     * Determine whether the userStoreCredit can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserStoreCredit  $model
     * @return mixed
     */
    public function restore(User $user, UserStoreCredit $model)
    {
        return false;
    }

    /**
     * Determine whether the userStoreCredit can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserStoreCredit  $model
     * @return mixed
     */
    public function forceDelete(User $user, UserStoreCredit $model)
    {
        return false;
    }
}
