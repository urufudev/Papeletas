<?php

namespace App\Policies;

use App\User;
use App\Leave;


use Illuminate\Auth\Access\HandlesAuthorization;

class LeavePolicy
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

    public function pass(User $user, Leave $leave)
    {
        return $user->id == $leave->user_id;
    }
}
