<?php

namespace App\Entity;

use DateInterval;
use DateTime;

abstract class AbstractCat
{
    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /** @var DateTime */
    private $birthday;

    public function __construct(string $name, int $age)
    {
        $birthday = (new DateTime())
            ->sub((new DateInterval('P2Y')));

        $this->name = $name;
        $this->age = $age;
        $this->birthday = $birthday;
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
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return self
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    /**
     * @param DateTime $birthday
     * @return self
     */
    public function setBirthday(DateTime $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }
}
