<?php


/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any classes "manually". Feels great to relax.
|
*/

require __DIR__.'/vendor/autoload.php';


// Load environment variables
Nicy\Framework\LoadEnvironment::instance()->register(
    __DIR__, '.env'
)->bootstrap();


/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new slim application instance
| is the IoC container for the system binding all the various parts.
|
*/

$framework = new Nicy\Framework\Main(__DIR__, 'src/config');


// Support Facade
$framework->withFacades();


// Exception error handler
$framework->singleton(
    Nicy\Framework\Exceptions\ExceptionHandler::class,
    App\Foundation\Exceptions\Handler::class
);


// Register any service providers
$framework->register([
    App\Foundation\Providers\AppServiceProvider::class
]);


/*
|--------------------------------------------------------------------------
| Register the application routes
|--------------------------------------------------------------------------
|
| Require route file register to the application
|
*/

if (is_dir($path = $framework->path('src/routes'))) {
    foreach (glob(rtrim($path, '/') . '/*.php') as $file) {
        require $file;
    }
}


/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script, so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $framework;
