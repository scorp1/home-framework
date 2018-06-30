<?php

namespace Otus\Core;

use Otus\Interfaces\RequestBuilderInterface;
use Otus\Interfaces\RequestInterface;

class RequestBuilder implements RequestBuilderInterface
{
    private $uri;
    private $get;
      /**
     * {@inheritdoc}
     */
    public function getRequest(array $get, array $post): RequestInterface
    {
        // TODO: Implement getRequest() method.
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->get = $get;

        return new Request($get, $this->uri);
    }
}