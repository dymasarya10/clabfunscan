<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfilPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function NotSuperAdmin(User $user): Response
    {
        return $user->peran !== 'superadmin'
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
