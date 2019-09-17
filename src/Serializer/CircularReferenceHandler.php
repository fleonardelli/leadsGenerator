<?php


namespace App\Serializer;


class CircularReferenceHandler
{
    /**
     * @param $object
     *
     * @return int
     */
    public function __invoke($object): int
    {
        return $object->getId();
    }
}
