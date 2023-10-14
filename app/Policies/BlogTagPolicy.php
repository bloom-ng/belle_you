<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogTag;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogTagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the blogTag can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list blogtags');
    }

    /**
     * Determine whether the blogTag can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogTag  $model
     * @return mixed
     */
    public function view(User $user, BlogTag $model)
    {
        return $user->hasPermissionTo('view blogtags');
    }

    /**
     * Determine whether the blogTag can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create blogtags');
    }

    /**
     * Determine whether the blogTag can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogTag  $model
     * @return mixed
     */
    public function update(User $user, BlogTag $model)
    {
        return $user->hasPermissionTo('update blogtags');
    }

    /**
     * Determine whether the blogTag can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogTag  $model
     * @return mixed
     */
    public function delete(User $user, BlogTag $model)
    {
        return $user->hasPermissionTo('delete blogtags');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogTag  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete blogtags');
    }

    /**
     * Determine whether the blogTag can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogTag  $model
     * @return mixed
     */
    public function restore(User $user, BlogTag $model)
    {
        return false;
    }

    /**
     * Determine whether the blogTag can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogTag  $model
     * @return mixed
     */
    public function forceDelete(User $user, BlogTag $model)
    {
        return false;
    }
}
