<?php

namespace Otus\Core;

use Otus\Exceptions\ControllerNotFoundException;
use Otus\Interfaces\ControllerFactoryInterface;
use Otus\Interfaces\ControllerInterface;
use Otus\Interfaces\RequestInterface;
use Otus\Controllers\PopularFilmsByGenreController;

class ControllerFactory implements ControllerFactoryInterface
{
    /**
     * @var array
     */
    private $router;

    /**
     * ControllerFactory constructor.
     *
     * @param array $router
     */
    public function __construct(array $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritdoc}
     */
    public function getController(RequestInterface $request): ControllerInterface
    {
            $uri = trim(current(explode('?', $request->getUri())), '/');
            $controller = !empty($this->router[$uri]) ? $this->router[$uri] : null;

            if(empty($controller)){
                throw new ControllerNotFoundException(sprintf("Not Found Controller", $uri));
            }
        return $controller;
    }
}