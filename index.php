<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once (__DIR__ . '/bootstrap/autoload.php');
require_once (__DIR__ . '/src/Exceptions/ControllerNotFoundException.php');

$genresList = 'Drama,Comedy';

$requestBuilder = $container->get(Otus\Core\RequestBuilder::class);

$request = $requestBuilder->getRequest($_GET,$_POST);

$controllerFactory = $container->get(Otus\Interfaces\ControllerFactoryInterface::class);


//echo "</br>" . "controller = " . "";
try{
    $controller = $controllerFactory->getController($request);
} catch (\Otus\Exceptions\ControllerNotFoundException $e){
    print('404 Not Found Controller.');
    exit;
}

$response = $controller->execute($request);
//$response->getResponse();
print_r($response->getFormatHTMLResponse());


