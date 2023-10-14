<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogPostTag;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostTagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the blogPostTag can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list blogposttags');
    }

    /**
     * Determine whether the blogPostTag can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPostTag  $model
     * @return mixed
     */
    public function view(User $user, BlogPostTag $model)
    {
        return $user->hasPermissionTo('view blogposttags');
    }

    /**
     * Determine whether the blogPostTag can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create blogposttags');
    }

    /**
     * Determine whether the blogPostTag can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPostTag  $model
     * @return mixed
     */
    public function update(User $user, BlogPostTag $model)
    {
        return $user->hasPermissionTo('update blogposttags');
    }

    /**
     * Determine whether the blogPostTag can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPostTag  $model
     * @return mixed
     */
    public function delete(User $user, BlogPostTag $model)
    {
        return $user->hasPermissionTo('delete blogposttags');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPostTag  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete blogposttags');
    }

    /**
     * Determine whether the blogPostTag can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPostTag  $model
     * @return mixed
     */
    public function restore(User $user, BlogPostTag $model)
    {
        return false;
    }

    /**
     * Determine whether the blogPostTag can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BlogPostTag  $model
     * @return mixed
     */
    public function forceDelete(User $user, BlogPostTag $model)
    {
        return false;
    }
}
