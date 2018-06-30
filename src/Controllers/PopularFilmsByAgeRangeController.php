<?php

namespace Otus\Controllers;

use Otus\Core\Response;
use Otus\Interfaces\ControllerInterface;
use Otus\Interfaces\FilmRepositoryInterface;
use Otus\Interfaces\RequestInterface;
use Otus\Interfaces\ResponseInterface;
use Otus\Services\FilmByAgeService;

class PopularFilmsByAgeRangeController implements ControllerInterface
{
    /**
     * @var FilmRepositoryInterface
     */
    private $filmRepository;

    /**
     * @var FilmByAgeService
     */
    private $filmService;

    /**
     * PopularFilmsByGenreController constructor.
     *
     * @param FilmRepositoryInterface $filmRepository
     */
    public function __construct(FilmRepositoryInterface $filmRepository, FilmByAgeService $filmByAgeService)
    {
        $this->filmRepository = $filmRepository;
        $this->filmService = $filmByAgeService;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(RequestInterface $request): ResponseInterface
    {
        $range = explode('-',$request->getParam('range'));
        $result = $this->filmService->getFilms($range[0],$range[1]);

        return new Response($result);
    }


}