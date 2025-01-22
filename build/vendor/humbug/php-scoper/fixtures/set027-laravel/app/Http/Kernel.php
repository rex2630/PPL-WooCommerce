<?php

namespace PPLCZVendor\App\Http;

use PPLCZVendor\Illuminate\Foundation\Http\Kernel as HttpKernel;
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [\PPLCZVendor\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class, \PPLCZVendor\Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, \PPLCZVendor\App\Http\Middleware\TrimStrings::class, \PPLCZVendor\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, \PPLCZVendor\App\Http\Middleware\TrustProxies::class];
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = ['web' => [
        \PPLCZVendor\App\Http\Middleware\EncryptCookies::class,
        \PPLCZVendor\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \PPLCZVendor\Illuminate\Session\Middleware\StartSession::class,
        // \Illuminate\Session\Middleware\AuthenticateSession::class,
        \PPLCZVendor\Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \PPLCZVendor\App\Http\Middleware\VerifyCsrfToken::class,
        \PPLCZVendor\Illuminate\Routing\Middleware\SubstituteBindings::class,
    ], 'api' => ['throttle:60,1', 'bindings']];
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = ['auth' => \PPLCZVendor\Illuminate\Auth\Middleware\Authenticate::class, 'auth.basic' => \PPLCZVendor\Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, 'bindings' => \PPLCZVendor\Illuminate\Routing\Middleware\SubstituteBindings::class, 'cache.headers' => \PPLCZVendor\Illuminate\Http\Middleware\SetCacheHeaders::class, 'can' => \PPLCZVendor\Illuminate\Auth\Middleware\Authorize::class, 'guest' => \PPLCZVendor\App\Http\Middleware\RedirectIfAuthenticated::class, 'signed' => \PPLCZVendor\Illuminate\Routing\Middleware\ValidateSignature::class, 'throttle' => \PPLCZVendor\Illuminate\Routing\Middleware\ThrottleRequests::class];
}
