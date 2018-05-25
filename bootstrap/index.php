<?php

use function DI\get;
use function DI\object;
use Otus\Repositories\FilmRepository;
use Otus\DbModel\DbModel;
use Otus\DbModel\DbConnection;
use Otus\Controllers\PopularFilmsByGenreController;

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
    DbModel::class      => object()->constructor(get(DbConnection::class)),

    PopularFilmsByGenreController::class => object()->constructor(
        get(FilmRepository::class),
    )
]);

$container = $builder->build();
