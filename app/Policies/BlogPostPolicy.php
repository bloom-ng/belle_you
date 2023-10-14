<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the blogPost can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list blogposts');
    }

    /**
     * Determine whether the blogPost can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPost  $model
     * @return mixed
     */
    public function view(User $user, BlogPost $model)
    {
        return $user->hasPermissionTo('view blogposts');
    }

    /**
     * Determine whether the blogPost can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create blogposts');
    }

    /**
     * Determine whether the blogPost can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPost  $model
     * @return mixed
     */
    public function update(User $user, BlogPost $model)
    {
        return $user->hasPermissionTo('update blogposts');
    }

    /**
     * Determine whether the blogPost can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPost  $model
     * @return mixed
     */
    public function delete(User $user, BlogPost $model)
    {
        return $user->hasPermissionTo('delete blogposts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPost  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete blogposts');
    }

    /**
     * Determine whether the blogPost can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPost  $model
     * @return mixed
     */
    public function restore(User $user, BlogPost $model)
    {
        return false;
    }

    /**
     * Determine whether the blogPost can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPost  $model
     * @return mixed
     */
    public function forceDelete(User $user, BlogPost $model)
    {
        return false;
    }
}
