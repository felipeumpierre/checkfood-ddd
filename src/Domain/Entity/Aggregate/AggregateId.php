<?php

namespace Checkfood\Domain\Entity\Aggregate;

class AggregateId
{
    /**
     * @param int $id
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}