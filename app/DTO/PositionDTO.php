<?php

namespace App\DTO;

class PositionDTO
{
    /** @var int */
    protected $id;

    /** @var int */
    protected $departmentId;

    /** @var string */
    protected $name;

    /** @var int */
    protected $salary;

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
     * @return int
     */
    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    /**
     * @param int $departmentId
     */
    public function setDepartmentId(int $departmentId): void
    {
        $this->departmentId = $departmentId;
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
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @param int $salary
     */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }
}