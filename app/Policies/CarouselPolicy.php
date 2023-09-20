<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Carousel;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarouselPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the carousel can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list carousels');
    }

    /**
     * Determine whether the carousel can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Carousel  $model
     * @return mixed
     */
    public function view(User $user, Carousel $model)
    {
        return $user->hasPermissionTo('view carousels');
    }

    /**
     * Determine whether the carousel can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create carousels');
    }

    /**
     * Determine whether the carousel can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Carousel  $model
     * @return mixed
     */
    public function update(User $user, Carousel $model)
    {
        return $user->hasPermissionTo('update carousels');
    }

    /**
     * Determine whether the carousel can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Carousel  $model
     * @return mixed
     */
    public function delete(User $user, Carousel $model)
    {
        return $user->hasPermissionTo('delete carousels');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Carousel  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete carousels');
    }

    /**
     * Determine whether the carousel can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Carousel  $model
     * @return mixed
     */
    public function restore(User $user, Carousel $model)
    {
        return false;
    }

    /**
     * Determine whether the carousel can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Carousel  $model
     * @return mixed
     */
    public function forceDelete(User $user, Carousel $model)
    {
        return false;
    }
}
