<?php

namespace Checkfood\Business\Command\Category;

use Checkfood\Business\Command\CommandInterface;

final class IDCategoryCommand implements CommandInterface
{
    /**
     * @var int|null
     */
    public $id;

    /**
     * ListCategoryCommand constructor.
     *
     * @param int|null $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }
}