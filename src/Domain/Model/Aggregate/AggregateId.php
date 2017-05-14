<?php

namespace Checkfood\Domain\Model\Aggregate;

class AggregateId
{
    /**
     * @param int $uuid
     */
    protected $uuid;

    /**
     * @return int
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}
