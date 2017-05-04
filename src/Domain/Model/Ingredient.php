<?php

namespace Checkfood\Domain\Model;

class Ingredient extends Aggregate\AggregateId implements \JsonSerializable
{
    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [];
    }
}
