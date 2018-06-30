<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once (__DIR__ . '/bootstrap/index.php');

$genresList = 'Drama,Comedy';

$requestBuilder = $container->get(Otus\Core\RequestBuilder::class);
/* RequestBuilder->getRequest($get,$post)->new Request($get,$post) $this->get = $get */
$request = $requestBuilder->getRequest($_GET,$_POST);
$getParam = $request->getParam('genres');
$uri = $request->getUri();
$value = $request->getValue();
$controllerFactory = $container->get(Otus\Interfaces\ControllerFactoryInterface::class);

echo "uri = ";
print_r($uri);
echo "</br>"."Param = ";
print_r($value);
echo "</br>" . "controller = ";

$controller = $controllerFactory->getController($request);
$response = $controller->execute($request);
echo $response->getResponse();
//$uriController = $controllerFactory->getRouter($request);
/* ControllerFactory->getController(Request)->Request->getParam() */
//$array = $controllerFactory->testGetController($request);
//$controller = $controllerFactory->getController($request);
//$response = $controller->execute($stringController);
//var_dump($controller);
//var_dump($response);

//$responce = $controller->execute($controller);
//$responce->getResponse();
//$data = $container->get(Otus\Controllers\PopularFilmsByGenreController::class)->execute($request);
//$connect = $container->get(Otus\DbModel\DbConnection::class)->getConnection();
//$result = $container->get(Otus\Services\FilmByGenreService::class)->getFilms($controller);
//var_dump($result);

