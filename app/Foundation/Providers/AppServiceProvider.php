<?php

namespace App\Foundation\Providers;

use Nicy\Framework\Bindings\Bus\BusServiceProvider;
use Nicy\Framework\Bindings\Bus\Dispatcher;
use Nicy\Framework\Bindings\Bus\ValidatingMiddleware;

class AppServiceProvider extends BusServiceProvider
{
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * Boot service provider
     *
     * @param Dispatcher $dispatcher
     */
    public function boot(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;

        $this->bootApiDispatcher();
    }

    /**
     * Boot api dispatcher and configure
     *
     * @return void
     */
    protected function bootApiDispatcher()
    {
        $this->dispatcher->mapUsing(function ($command) {
            return Dispatcher::simpleMapping(
                $command, 'App\Bus\Commands', 'App\Bus\Handlers'
            );
        });

        $this->dispatcher->pipeThrough([ValidatingMiddleware::class]);
    }

    /**
     * Register api provider
     *
     * @return void
     */
    public function register()
    {
        // Register middleware
        // $this->container->make('main')->middleware(Middleware::class);

        // Loading any configures
        $this->mergeConfigFrom('config-name', 'merged-key');
    }
}