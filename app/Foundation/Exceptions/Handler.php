<?php

namespace App\Foundation\Exceptions;

use Exception;
use Nicy\Framework\Exceptions\Handler as FrameworkException;
use Slim\Error\Renderers\JsonErrorRenderer;

class Handler extends FrameworkException
{
    /**
     * @var string
     */
    protected $defaultRenderer = JsonErrorRenderer::class;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param Exception $e
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function render(Exception $e)
    {
        $response = parent::render($e);

        return $response->withHeader('Content-Type', 'application/json;charset=utf-8');
    }
}