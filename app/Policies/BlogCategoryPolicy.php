<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the blogCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list blogcategories');
    }

    /**
     * Determine whether the blogCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogCategory  $model
     * @return mixed
     */
    public function view(User $user, BlogCategory $model)
    {
        return $user->hasPermissionTo('view blogcategories');
    }

    /**
     * Determine whether the blogCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create blogcategories');
    }

    /**
     * Determine whether the blogCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogCategory  $model
     * @return mixed
     */
    public function update(User $user, BlogCategory $model)
    {
        return $user->hasPermissionTo('update blogcategories');
    }

    /**
     * Determine whether the blogCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogCategory  $model
     * @return mixed
     */
    public function delete(User $user, BlogCategory $model)
    {
        return $user->hasPermissionTo('delete blogcategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete blogcategories');
    }

    /**
     * Determine whether the blogCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogCategory  $model
     * @return mixed
     */
    public function restore(User $user, BlogCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the blogCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, BlogCategory $model)
    {
        return false;
    }
}
