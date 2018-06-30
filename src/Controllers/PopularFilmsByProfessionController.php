<?php

namespace Otus\Controllers;

use Otus\Core\Response;
use Otus\Interfaces\ControllerInterface;
use Otus\Interfaces\FilmRepositoryInterface;
use Otus\Interfaces\RequestInterface;
use Otus\Interfaces\ResponseInterface;
use Otus\Services\FilmsByProfessionService;

class PopularFilmsByProfessionController implements ControllerInterface
{
    /**
     * @var FilmRepositoryInterface
     */
    private $filmRepository;

    /**
     * @var FilmsByProfessionService
     */
    private $filmService;

    /**
     * PopularFilmsByGenreController constructor.
     *
     * @param FilmRepositoryInterface $filmRepository
     */
    public function __construct(FilmRepositoryInterface $filmRepository,FilmsByProfessionService $filmsByProfessionService)
    {
        $this->filmRepository = $filmRepository;
        $this->filmService = $filmsByProfessionService;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(RequestInterface $request): ResponseInterface
    {
        $professionList = $request->getParam('proflist');
        $result = $this->filmService->getFilms($professionList);

        return new Response($result);
    }
}