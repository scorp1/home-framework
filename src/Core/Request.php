<?php

namespace Otus\Core;

use Otus\Interfaces\RequestBuilderInterface;
use Otus\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @var array
     */
    private $get;

    /**
     * @var array
     */
    private $uri;

    public function __construct(array $get, string $uri)
    {
        $this->get = $get;
        $this->uri = $uri;
    }

    public function getParam(string $key, string $default = null): ?string
    {
        if (isset($this->get[$key])) {

            return $this->get[$key];
        }

        return $default;
    }

    /** My function
     *
     * @return array|mixed
     */
    public function getValue()
    {
        return $this->get;
    }

    public function getUri()
    {
        return $this->uri;
    }
}