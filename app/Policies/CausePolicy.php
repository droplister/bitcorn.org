<?php

namespace App\Policies;

use App\User;
use App\Cause;
use Illuminate\Auth\Access\HandlesAuthorization;

class CausePolicy
{
    use HandlesAuthorization;

    /**
     * Admin Not Limited
     *
     * @param  \App\User  $user
     * @param  string  ability
     * @return boolean
     */
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return boolean
     */
    public function view(User $user, Cause $cause)
    {
        return $cause->isApproved() || $user->isBoard() || $cause->user_id === $user->id;
    }

    /**
     * Determine whether the user can create causes.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->hasCompleteProfile();
    }

    /**
     * Determine whether the user can update the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return boolean
     */
    public function update(User $user, Cause $cause)
    {
        return $cause->pledged === 0 && $user->isBoard();
    }

    /**
     * Determine whether the user can delete the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return boolean
     */
    public function delete(User $user, Cause $cause)
    {
        return $cause->pledged === 0 && $user->isBoard();
    }
}