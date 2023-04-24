<?php

namespace ArturZeAlves\Model;

class Design
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $splitPercent;

    /**
     * @param string $name
     * @param int $splitPercent
     */
    public function __construct(string $name, int $splitPercent)
    {
        $this->name = $name;
        $this->splitPercent = $splitPercent;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSplitPercent(): int
    {
        return $this->splitPercent;
    }
}
