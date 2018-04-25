<?php

namespace App\Policies;

use App\Http\Models\User;
use App\Http\Models\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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

    public function update(User $user, Group $group)
    {
        return $group->create_id === $user->id;
    }
}
