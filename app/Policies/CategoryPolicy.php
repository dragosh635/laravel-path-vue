<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy {
    use HandlesAuthorization;

    /**
     * If we are using this policy on a request, the user needs to be an admin
     *
     * @param User $user
     * @param string $ability
     *
     * @return bool
     */
    public function before( $user, $ability ) {
        if ( $user->is_admin ) {
            return true;
        }
    }

    /**
     * Determine whether the user can manage categories.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function manage( User $user ) {
        return $user->is_admin;
    }
}
