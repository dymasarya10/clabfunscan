<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeacherPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user): Response
    {
        return $user->peran === 'superadmin'
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
