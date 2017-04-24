<?php

namespace Checkfood\Domain\Model\Aggregate;

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