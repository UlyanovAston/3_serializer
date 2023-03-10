<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

class GroupObject
{
    /**
     * @var string
     * @Groups({"one"})
     */
    private $foo;

    /**
     * @var string
     * @Groups({"two"})
     */
    private $bar;

    /**
     * @var string
     * @Groups({"three"})
     */
    private $xyz;

    public function __construct(string $foo, string $bar, string $xyz)
    {
        $this->foo = $foo;
        $this->bar = $bar;
        $this->xyz = $xyz;
    }

    /**
     * @return string
     */
    public function getFoo(): string
    {
        return $this->foo;
    }

    /**
     * @param string $foo
     */
    public function setFoo(string $foo): void
    {
        $this->foo = $foo;
    }

    /**
     * @return string
     */
    public function getBar(): string
    {
        return $this->bar;
    }

    /**
     * @param string $bar
     */
    public function setBar(string $bar): void
    {
        $this->bar = $bar;
    }

    /**
     * @return string
     */
    public function getXyz(): string
    {
        return $this->xyz;
    }

    /**
     * @param string $xyz
     */
    public function setXyz(string $xyz): void
    {
        $this->xyz = $xyz;
    }
}
