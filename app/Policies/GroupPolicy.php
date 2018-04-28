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

    public function destroy(User $currentUser, Group $group,User $user){
        return $group->create_id === $currentUser->id && $currentUser->id !== $user->id;
    }

    public function show(User $currentUser,Group $group){
        //获取组内所有用户id
        $users=$group->getUsers()->allRelatedIds()->toArray();
        return in_array($currentUser->id,$users);
    }
}
