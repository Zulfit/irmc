<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //view academician list only admin
        Gate::define('academician-list',function (User $user){
            return $user->role === 'admin';
        });

        //create project only admin
        Gate::define('staff-list',function (User $user){
            return $user->role === 'admin';
        });

        //create project only admin
        Gate::define('create-project',function (User $user){
            return $user->role === 'admin';
        });
        
        //view project Admin & staff
        Gate::define('view-projects-irmc', function (User $user) {
            // Check if the user has the role of Admin Executive
            return in_array($user->role, ['admin', 'staff']);
        });

        //view project leader
        Gate::define('view-projects-leader', function (User $user) {
            // Check if the user is the leader of the given project
            return $user->role === 'academician';
        });
        
        //update project Admin 
        Gate::define('update-projects-admin', function (User $user) {
            // Check if the user has the role of Admin Executive
            return $user->role === 'admin';
        });

        //update project leader
        Gate::define('update-projects-leader', function (User $user) {
            // Check if the user is the leader of the given project
            return $user->role === 'academician';
        });

        //view project Admin & academician
        Gate::define('view-milestone-admin', function (User $user) {
            // Check if the user has the role of Admin Executive
            return $user->role === 'admin';
        });

        //view project Admin & academician
        Gate::define('view-milestone-academician', function (User $user) {
            // Check if the user has the role of Admin Executive
            return $user->role === 'academician';
        });

        //view project Admin & academician
        Gate::define('create-milestone', function (User $user) {
            // Check if the user has the role of Admin Executive
            return in_array($user->role, ['admin', 'academician']);
        });
        
    }
}
