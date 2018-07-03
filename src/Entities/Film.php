<?php

namespace Otus\Entities;

use Otus\Interfaces\FilmInterface;

class Film implements FilmInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * Film constructor.
     *
     * @param int $id
     * @param string $title
     * @param string $releaseDate
     */
    public function __construct(array $data)
    {
        $this->age = $data['data'];
        $this->title = $data['title'];
        $this->name = $data['name'];
    }

    /**
     * @inheritDoc
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }
}