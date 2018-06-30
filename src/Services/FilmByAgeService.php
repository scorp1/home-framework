<?php
namespace Otus\Services;

use Otus\Exceptions\ControllerNotFoundException;
use Otus\Repositories\FilmRepository;

class FilmByAgeService
{
    /**
     * @var FilmRepository
     */
    protected $filmRepository;

    /**
     * FilmByGenreService constructor.
     * @param FilmRepository $filmRepository
     */
    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    /**
     *
     * @param array $genres
     * @return array
     */
    public function getFilms(int $fromAge, int $toAge)
    {

        return $this->filmRepository->getPopularFilmsByAgeRange($fromAge, $toAge);
    }

}