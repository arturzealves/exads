<?php

namespace ArturZeAlves\Model;

use ArturZeAlves\Model\Design;

class Promotion
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Design[]
     */
    private $designs = [];

    /**
     * @param string $name
     * @param array $designs Array of Design objects
     */
    public function __construct(string $name, array $designs)
    {
        $this->name = $name;
        $this->designs = $designs;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array An array of Design objects
     */
    public function getDesigns(): array
    {
        return $this->designs;
    }
}
