<?php

namespace App\Bus\Commands;

use Nicy\Support\Arr;

abstract class Command
{
    /**
     * @var array
     */
    public $data;

    /**
     * Command constructor.
     *
     * @param array $data
     */
    public function __construct(array $data=[])
    {
        $this->data = $data;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default=null)
    {
        return Arr::get($this->data, $key, $default);
    }
}