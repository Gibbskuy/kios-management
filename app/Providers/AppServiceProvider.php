<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider {

    public function register(): void {
        //
    }

    public function boot(): void {
        Route::prefix( 'api' ) // Semua route akan berada di bawah /api
        ->middleware( 'api' )
        ->group( base_path( 'routes/api.php' ) );

        $locale = Session::get( 'locale', config( 'app.locale' ) );
        App::setLocale( $locale );
    }
}
