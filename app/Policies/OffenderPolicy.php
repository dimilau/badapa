<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OffenderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if($user->hasRole('super admin')){
            return true;
        }
    }

    public function list(User $user)
    {
        return $user->authorizeRoles(array('admin', 'super admin'));
    }

    public function show(User $user)
    {
        return $user->authorizeRoles(array('admin', 'super admin'));
    }
}
