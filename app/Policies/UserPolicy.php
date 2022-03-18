<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, User $user) {
        //當前使用者ID=編輯ID時才可以訪問編輯頁面，否則403
        return $currentUser->id === $user->id;
    }

    public function destroy(User $currentUser,User $user) {
        //當前使用者擁有管理權限 和 當前使用者刪除的資料不是自己時
        // return $currentUser->is_admin;
        return $currentUser->is_admin && $currentUser->id !== $user->id;
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
