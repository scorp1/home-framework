<?php

use function DI\get;
use function DI\object;
use Otus\Repositories\FilmRepository;
use Otus\DbModel\DbModel;
use Otus\DbModel\DbConnection;
use Otus\Interfaces\RequestBuilderInterface;
use Otus\Interfaces\RequestInterface;
use Otus\Interfaces\ControllerInterface;
use Otus\Controllers\PopularFilmsByGenreController;
use Otus\Controllers\PopularFilmsByAgeRangeController;
use Otus\Controllers\PopularFilmsByPeriodController;
use Otus\Controllers\PopularFilmsByProfessionController;
use Otus\Services\FilmByGenreService;
use Otus\Interfaces\FilmRepositoryInterface;
use Otus\Interfaces\ControllerFactoryInterface;
use Otus\Core\ControllerFactory;
use Otus\Exceptions\ControllerNotFoundException;
use Otus\Core\Response;
use Otus\Core\InitController;
require_once __DIR__ . "/../vendor/autoload.php";

$builder = new \DI\ContainerBuilder();

//$builder->useAnnotations(true);
$builder->addDefinitions([
    'dsn' => 'pgsql:host=localhost;dbname=movelens',
    'user' => 'scorp',
    'password' => '777',

    DbConnection::class => object()->constructor(
        get('dsn'),
        get('user'),
        get('password')
    ),
    'app.routes' => array(
        'get-films-by-age-range' => get(PopularFilmsByAgeRangeController::class),
        'get-films-by-genre' => get(PopularFilmsByGenreController::class),
        'get-films-by-profession' => get(PopularFilmsByProfessionController::class),
        'get-films-by-period' => get(PopularFilmsByPeriodController::class),
    ),
    DbModel::class      => object()->constructor(get(DbConnection::class)),

    // PopularFilmsByGenreController::class => object()->constructor(get(FilmByGenreService::class)),
    RequestBuilderInterface::class => object()->constructor(get(RequestInterface::class)),

    ControllerFactoryInterface::class => object(ControllerFactory::class),
    ControllerFactory::class => object()->constructor(get('app.routes')),

    PopularFilmsByGenreController::class => object()->constructor(
        get(FilmRepository::class),
        get(FilmByGenreService::class)
    ),

    FilmRepositoryInterface::class => object(FilmRepository::class),

    FilmByGenreService::class => object(),
    InitController::class => object(),

    Response::class => object(),
]);

$container = $builder->build();
