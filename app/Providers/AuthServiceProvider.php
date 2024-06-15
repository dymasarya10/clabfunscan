<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Content;
use App\Models\Teacher;
use App\Policies\ContentPolicy;
use App\Policies\CreatorPolicy;
use App\Policies\ProfilPolicy;
use App\Policies\TeacherPolicy;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Teacher::class => TeacherPolicy::class,
        Content::class => ContentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('notadmin',[ProfilPolicy::class, 'NotSuperAdmin']);
    }
}
