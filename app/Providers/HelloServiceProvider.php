<?php

namespace App\Providers;

use App\View\Components\Message;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
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
        Blade::component('package-message', Message::class);
        View::composer(
            'hello.index', 'App\Http\Composers\HelloComposer'
        );
    }
}
