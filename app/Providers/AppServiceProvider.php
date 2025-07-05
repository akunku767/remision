<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            function ($app) {
                return new class($app) extends \Illuminate\Foundation\Exceptions\Handler {
                    public function render($request, \Throwable $e)
                    {
                        if ($e instanceof AuthenticationException && $request->is('api/*')) {
                            return response()->json(['message' => 'Unauthorized Access'], 401);
                        }
                        return parent::render($request, $e);
                    }
                };
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
