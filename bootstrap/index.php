<?php

use function DI\get;
use function DI\object;
use Otus\Repositories\FilmRepository;

require_once __DIR__ . "/../vendor/autoload.php";

$builder = new \DI\ContainerBuilder();

$builder->useAnnotations(true);
$builder->addDefinitions([
    'db-host' => ''
]);

$dsn = "pgsql:host=localhost;dbname=movelens";
$user = 'scorp';
$pass = '777';
$genreList = ['Drama'];
$query = new FilmRepository(new \Otus\Core\DbConnection($dsn,$user,$pass));
print_r($query->getPopularFilmsByGenre($genreList));