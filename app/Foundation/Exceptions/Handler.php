<?php

namespace App\Foundation\Exceptions;

use Nicy\Framework\Exceptions\Handler as FrameworkException;

class Handler extends FrameworkException
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class
    ];
}