<?php

namespace Otus\Controllers;

use Otus\Core\Response;
use Otus\Interfaces\ControllerInterface;
use Otus\Interfaces\FilmRepositoryInterface;
use Otus\Interfaces\RequestInterface;
use Otus\Interfaces\ResponseInterface;
use Otus\Services\FilmByPeriodService;

class PopularFilmsByPeriodController implements ControllerInterface
{
    /**
     * @var FilmRepositoryInterface
     */
    private $filmRepository;

    /**
     * @var FilmByPeriodService
     */
    private $filmService;

    /**
     * PopularFilmsByGenreController constructor.
     *
     * @param FilmRepositoryInterface $filmRepository
     */
    public function __construct(FilmRepositoryInterface $filmRepository, FilmByPeriodService $filmByPeriodService)
    {
        $this->filmRepository = $filmRepository;
        $this->filmService = $filmByPeriodService;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(RequestInterface $request): ResponseInterface
    {
        $period = explode('-', $request->getParam('period'));
        $result = $this->filmService->getFilms($period[0],$period[1]);

        return new Response($result);
    }
}