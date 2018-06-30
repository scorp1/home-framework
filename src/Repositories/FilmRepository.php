<?php

namespace Otus\Repositories;

use Otus\Core\FilmBuilder;
use Otus\DbModel\DbConnection;
use Otus\DbModel\DbModel;
use Otus\Interfaces\FilmRepositoryInterface;
use Otus\Interfaces\FilmInterface;
use PDO;
use PDOStatement;

class FilmRepository implements FilmRepositoryInterface
{
    /**
     * @var DbConnection
     */
    public $dbConnection;

    private $filmBuilder;
    /**
     * FilmRepository constructor.
     *
     * @param DbConnection $dbConnection
     */
    public function __construct(DbConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByGenre(array $genresList): array
    {
        $genres = $this->arrayItemHandler($genresList);

        $query = 'SELECT m.title, g.name FROM movie AS m
                      INNER JOIN ratings AS r ON m.id = r.movie_id
                      INNER JOIN genres_movies AS gm ON  r.movie_id = gm.movie_id
                      INNER JOIN genres AS g ON g.id = gm.genre_id
                    WHERE g.name in ('.$genres.') AND r.rating > 3 LIMIT 20;';

        $sth = $this->dbConnection->getConnection()->query($query);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_GROUP);

       return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByProfession(array $professionsList): array
    {
        $professionsList = $this->arrayItemHandler($professionsList);

        $query = 'SELECT m.title, o.name FROM movie AS m
                  INNER JOIN ratings AS r ON r.movie_id = m.id
                  INNER JOIN users AS u ON u.id = r.user_id
                  INNER JOIN occupations AS o ON o.id = u.occupation_id
                  WHERE o.name IN ('.$professionsList.')
                  AND r.rating > 3 LIMIT 50;';

        $sth = $this->dbConnection->getConnection()->query($query);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_GROUP);

        return $result;
    }
    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByAgeRange(int $fromAge, int $toAge): array
    {
        $query = 'SELECT m.title, u.age FROM movie AS m
                  INNER JOIN ratings AS r ON r.movie_id = m.id
                  INNER JOIN users AS u ON u.id = r.user_id
                  WHERE u.age > ('.$fromAge.') and u.age < ('.$toAge.') and r.rating = 5 LIMIT 200;';
        $sth = $this->dbConnection->getConnection()->query($query);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_GROUP);

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getPopularFilmsByPeriod(int $fromYear, int $toYear): array
    {
       $fromYear = $this->dateFormatToTimestamp($fromYear);
       $toYear =$this->dateFormatToTimestamp($toYear);

       $query = 'SELECT m.title FROM movie AS m
                INNER JOIN ratings AS r ON r.movie_id = m.id
                INNER JOIN users AS u ON u.id = r.user_id
                WHERE m.release_date BETWEEN ('.$fromYear.') AND ('.$toYear.') LIMIT 100;';

        $sth = $this->dbConnection->getConnection()->query($query);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_GROUP);

        return $result;
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

    /**
     * @param array $array
     * @return string
     */
    private function arrayItemHandler(array $array): string
    {
        $array = array_map(function ($item) {

            return $this->dbConnection->getConnection()->quote($item);
        }, $array);

        return implode(',', $array);
    }

    /**
     * @param int $date
     * @return string
     */
    private function dateFormatToTimestamp(int $date)
    {
        $result = date("Y-m-d",strtotime($date));

        return $this->dbConnection->getConnection()->quote($result);
    }


}