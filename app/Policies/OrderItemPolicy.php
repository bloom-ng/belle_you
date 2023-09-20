<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the orderItem can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list orderitems');
    }

    /**
     * Determine whether the orderItem can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderItem  $model
     * @return mixed
     */
    public function view(User $user, OrderItem $model)
    {
        return $user->hasPermissionTo('view orderitems');
    }

    /**
     * Determine whether the orderItem can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create orderitems');
    }

    /**
     * Determine whether the orderItem can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderItem  $model
     * @return mixed
     */
    public function update(User $user, OrderItem $model)
    {
        return $user->hasPermissionTo('update orderitems');
    }

    /**
     * Determine whether the orderItem can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderItem  $model
     * @return mixed
     */
    public function delete(User $user, OrderItem $model)
    {
        return $user->hasPermissionTo('delete orderitems');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderItem  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete orderitems');
    }

    /**
     * Determine whether the orderItem can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderItem  $model
     * @return mixed
     */
    public function restore(User $user, OrderItem $model)
    {
        return false;
    }

    /**
     * Determine whether the orderItem can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderItem  $model
     * @return mixed
     */
    public function forceDelete(User $user, OrderItem $model)
    {
        return false;
    }
}
