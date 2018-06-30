<?php
namespace Otus\Services;

use Otus\Exceptions\ControllerNotFoundException;
use Otus\Repositories\FilmRepository;

class FilmByPeriodService
{
    /**
     * @var
     */
    protected $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function getFilms(int $fromYear, int $toYear)
    {

        return $this->filmRepository->getPopularFilmsByPeriod($fromYear, $toYear);
    }
}