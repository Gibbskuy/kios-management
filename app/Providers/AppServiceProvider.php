<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Route::prefix('api') // Semua route akan berada di bawah /api
            ->middleware('api')
            ->group(base_path('routes/api.php'));
    }
}
