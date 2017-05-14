<?php

namespace Checkfood\Business\Command\Category;

final class ListCategoryCommand
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
