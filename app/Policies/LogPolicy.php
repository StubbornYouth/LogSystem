<?php

namespace App\Policies;

use App\Http\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Http\Models\Log;

class LogPolicy
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
    //日志更新是时的权限验证
    public function update(User $currentUser,Log $log){
        return $currentUser->id === $log->user_id;
    }
}
