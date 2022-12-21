<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\Api;
use Nicy\Framework\Support\Traits\{ForRequest, ForResponse};
use Nicy\Framework\Support\Contracts\Router\Arguments;

class RunController
{
    use Api, ForRequest, ForResponse;

    /**
     * @param Arguments $arguments
     *
     * @return mixed
     * @throws \App\Foundation\Exceptions\HttpException
     */
    public function __invoke(Arguments $arguments)
    {
        return $this->dispatch($arguments->get('any', 'index'), $this->input()->toArray());
    }
}