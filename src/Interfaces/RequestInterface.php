<?php

namespace Otus\Interfaces;

interface RequestInterface
{
    /**
     * Returns value by key name
     *
     * @param string $key
     * @param string|null $default
     *
     * @return string|null
     */
    public function getParam(string $key, string $default = null): ?string;

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return mixed
     */
    public function getUri();
}