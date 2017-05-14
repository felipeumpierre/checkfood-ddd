<?php

namespace Checkfood\Business\Command\Category;

final class UpdateCategoryCommand
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
