<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function showCreator(User $user): Response
    {
        return auth()->user()->isSuperAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function make(User $user): Response
    {
        return auth()->user()-> peran !== 'superadmin'
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
