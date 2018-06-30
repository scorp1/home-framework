<?php

namespace Otus\Controllers;

use Otus\Core\Response;
use Otus\Interfaces\ControllerInterface;
use Otus\Interfaces\FilmRepositoryInterface;
use Otus\Interfaces\RequestInterface;
use Otus\Interfaces\ResponseInterface;
use Otus\Services\FilmByGenreService;

class PopularFilmsByGenreController implements ControllerInterface
{
    /**
     * @var FilmRepositoryInterface
     */
    private $filmRepository;

    /**
     * @var FilmByGenreService
     */
    private $filmService;
    /**
     * PopularFilmsByGenreController constructor.
     *
     * @param FilmRepositoryInterface $filmRepository
     */
    public function __construct(FilmRepositoryInterface $filmRepository, FilmByGenreService $filmByGenreService)
    {
        $this->filmRepository = $filmRepository;
        $this->filmService = $filmByGenreService;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(RequestInterface $request): ResponseInterface
    {
        $genreList = $request->getParam('genres');
        $result = $this->filmService->getFilms($genreList);

        return new Response($result);
    }
}