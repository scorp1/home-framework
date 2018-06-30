<?php

namespace Otus\Core;

use Otus\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    protected $responce;

    public function __construct($responce)
    {
        $this->responce = $responce;
    }

    public function getResponse(): string
    {
        return "<pre>" . print_r($this->responce) . "</pre>";
    }
}