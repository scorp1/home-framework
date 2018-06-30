<?php
namespace Otus\Services;

use Otus\Exceptions\ControllerNotFoundException;
use Otus\Repositories\FilmRepository;

class FilmsByProfessionService
{
    /**
     * @var
     */
    protected $filmRepository;


    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function getFilms(string $professionList)
    {

        return $this->filmRepository->getPopularFilmsByProfession(explode(',', $professionList));
    }
}
