<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, User $user) {
        //當使用者ID=編輯ID時才可以訪問編輯頁面，否則403
        return $currentUser->id === $user->id;
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
