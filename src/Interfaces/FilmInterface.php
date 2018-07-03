<?php

namespace Otus\Interfaces;

interface FilmInterface
{
    /**
     * Returns id of this film
     *
     * @return int
     */
    public function getAge(): int;

    /**
     * Returns title of this film
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Returns release date of this film
     *
     * @return string
     */
    public function getName(): string;
}