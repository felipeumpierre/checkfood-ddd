<?php

namespace Checkfood\Business\Command\Category;

final class CreateCategoryCommand
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string
     */
    public $name;

    /**
     * CreateCategoryCommand constructor.
     *
     * @param string $uuid
     * @param string $name
     */
    public function __construct(string $uuid, string $name)
    {
        $this->uuid = $uuid;
        $this->name = $name;
    }
}
