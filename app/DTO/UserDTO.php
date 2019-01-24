<?php

namespace App\DTO;

class UserDTO
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $email;

    /** @var PositionDTO [] */
    protected $positions;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return PositionDTO[]
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * @param PositionDTO $position
     */
    public function addPosition(PositionDTO $position): void
    {
        $this->positions[] = $position;
    }
}