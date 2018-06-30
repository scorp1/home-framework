<?php

require_once (__DIR__ . '/bootstrap/index.php');

$genresList = 'Drama,Comedy';

$requestBuilder = $container->get(Otus\Core\RequestBuilder::class);

$request = $requestBuilder->getRequest($_GET,$_POST);

$controllerFactory = $container->get(Otus\Interfaces\ControllerFactoryInterface::class);

var_dump($request);
$controller = $controllerFactory->getController($request);
//$connect = $container->get(Otus\DbModel\DbConnection::class)->getConnection();
$result = $container->get(Otus\Services\FilmByGenreService::class)->getFilms($genresList);
var_dump($controller);

