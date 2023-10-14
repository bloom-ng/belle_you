<?php

namespace App\Policies;

use App\Models\User;
use App\Models\NetworkTeam;
use Illuminate\Auth\Access\HandlesAuthorization;

class NetworkTeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the networkTeam can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list networkteams');
    }

    /**
     * Determine whether the networkTeam can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NetworkTeam  $model
     * @return mixed
     */
    public function view(User $user, NetworkTeam $model)
    {
        return $user->hasPermissionTo('view networkteams');
    }

    /**
     * Determine whether the networkTeam can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create networkteams');
    }

    /**
     * Determine whether the networkTeam can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NetworkTeam  $model
     * @return mixed
     */
    public function update(User $user, NetworkTeam $model)
    {
        return $user->hasPermissionTo('update networkteams');
    }

    /**
     * Determine whether the networkTeam can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NetworkTeam  $model
     * @return mixed
     */
    public function delete(User $user, NetworkTeam $model)
    {
        return $user->hasPermissionTo('delete networkteams');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NetworkTeam  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete networkteams');
    }

    /**
     * Determine whether the networkTeam can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NetworkTeam  $model
     * @return mixed
     */
    public function restore(User $user, NetworkTeam $model)
    {
        return false;
    }

    /**
     * Determine whether the networkTeam can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NetworkTeam  $model
     * @return mixed
     */
    public function forceDelete(User $user, NetworkTeam $model)
    {
        return false;
    }
}
