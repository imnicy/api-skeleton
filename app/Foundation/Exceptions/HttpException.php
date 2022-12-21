<?php

namespace App\Foundation\Exceptions;

use Exception;

class HttpException extends Exception
{
    public function __construct($message='notfound!')
    {
        parent::__construct($message, 404);
    }
}