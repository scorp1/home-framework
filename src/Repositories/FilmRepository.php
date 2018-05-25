<?php

namespace Otus\Repositories;

use Otus\Core\DbConnection;
use Otus\Interfaces\FilmRepositoryInterface;
use Otus\Interfaces\FilmInterface;
use PDO;
use PDOStatement;

class FilmRepository implements FilmRepositoryInterface
{
    /**
     * @var DbConnection
     */
    private $dbConnection;

    /**
     * FilmRepository constructor.
     *
     * @param DbConnection $dbConnection
     */
    public function __construct(DbConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection->getConnection();
    }

    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByGenre(array $genresList): array
    {
        $genresListt = implode(',', $genresList);
        $query = 'SELECT m.title, g.name FROM movie AS m
                      INNER JOIN ratings AS r ON m.id = r.movie_id
                      INNER JOIN genres_movies AS gm ON  r.movie_id = gm.movie_id
                      INNER JOIN genres AS g ON g.id = gm.genre_id
                    WHERE g.name in ('.$genresList.') AND r.rating > 3 LIMIT 20;';
        $sth = $this->dbConnection->query($query)->fetchAll(\PDO::FETCH_ASSOC);

        return $sth;
    }

    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByProfession(array $professionsList): array
    {
        // TODO: Implement getPopularFilmsByProfession() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByAgeRange(int $fromAge, int $toAge): array
    {
        // TODO: Implement getPopularFilmsByAgeRange() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByPeriod(int $fromYear, int $toYear): array
    {
        // TODO: Implement getPopularFilmsByPeriod() method.
    }

    /**
     * @param array $data
     * @return array
     */
    private function getArrayObjectFilm(array $data): array
    {
        return array_map(function ($item) {
            return $this->filmBuilder->getFilm($item);
        }, $data);
    }

}