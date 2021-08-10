<?php

namespace App\Policies;

use App\Models\BlogPostModels;
use App\Models\User;
use App\reprositories\UsersReprositories;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class BlogPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

     private $userReprositories;

     public function __construct()
     {
        $this->userReprositories = app(UsersReprositories::class);
     }

    public function viewAny(User $user)
    {
        $userRole = $this->userReprositories->getForPolicy();
       return  $user->getAdminRole()->contains($userRole->role);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\BlogPostModels  $blogPostModels
     * @return mixed
     */
    public function view(User $user, BlogPostModels $blogPostModels)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\BlogPostModels  $blogPostModels
     * @return mixed
     */
    public function update(User $user, BlogPostModels $blogPostModels)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\BlogPostModels  $blogPostModels
     * @return mixed
     */
    public function delete(User $user, BlogPostModels $blogPostModels)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\BlogPostModels  $blogPostModels
     * @return mixed
     */
    public function restore(User $user, BlogPostModels $blogPostModels)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Models\BlogPostModels  $blogPostModels
     * @return mixed
     */
    public function forceDelete(User $user, BlogPostModels $blogPostModels)
    {
        //
    }
}
