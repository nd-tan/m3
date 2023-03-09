<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
       return $user->hasPermission('Brand_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
      return $user->hasPermission('Brand_view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('Brand_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
       return $user->hasPermission('Brand_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {

       return $user->hasPermission('Brand_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        return true;
       return $user->hasPermission('Brand_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user)
    {
       return $user->hasPermission('Brand_forceDelete');
    }
}
