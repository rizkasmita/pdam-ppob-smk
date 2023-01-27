<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // gate khusus user yang sudah login
        // Jika ditempatkan di App\Providers\AuthServiceProvider ada error berarti Gate nya harus dipindahkan ke App\Providers\AppServiceProvider
        Gate::define('superadmin', function(User $user){
            // $user->level = auth()->user()->level
            return $user->level === 'superadmin';
        });

        Gate::define('admin', function(User $user){
            return $user->level === 'admin';
        });

        Gate::define('petugas', function(User $user){
            return $user->level === 'petugas';
        });
    }
}
