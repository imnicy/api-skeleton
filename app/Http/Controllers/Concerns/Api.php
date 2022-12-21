<?php

namespace App\Http\Controllers\Concerns;

use Nicy\Framework\Bindings\Bus\Dispatcher;
use App\Foundation\Exceptions\HttpException;

trait Api
{
    /**
     * @var array
     */
    protected $routes = [];

    /**
     * Send the given command to the dispatcher for execution.
     *
     * @param object $command
     *
     * @return mixed
     */
    protected function execute(object $command)
    {
        return container(Dispatcher::class)->dispatch($command);
    }

    /**
     * @param string $slug
     * @param array $data
     * @return mixed
     * @throws \App\Foundation\Exceptions\HttpException
     */
    protected function dispatch(string $slug, array $data)
    {
        if (! isset($this->routes[$slug])) {
            throw new HttpException(sprintf('route %s not found', $slug));
        }

        return $this->execute(new $this->routes[$slug]($data));
    }
}