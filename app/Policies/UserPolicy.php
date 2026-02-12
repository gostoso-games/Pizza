<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
        const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_ADMIN = 'admin';
    const ROLE_MOTOBOY = 'motoboy';
    const ROLE_USER = 'user';

    
    public function isSuperAdmin(User $user) {
        return $user->role === self::ROLE_SUPER_ADMIN;
    }

    public function isAdmin(User $user) {
        return $user->role === self::ROLE_ADMIN || $this->isSuperAdmin($user);
    }

    public function isMotoboy(User $user) {
        return $user->role === self::ROLE_MOTOBOY;
    }
public function viewWelcome(?User $user): bool
{
    return true;
}







}