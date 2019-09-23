<?php

namespace App\Service;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

class CustomSerializer
{
    /**
     * @param $data
     *
     * @return string
     */
    public function serialize($data): string
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->enableMaxDepthChecks()
        );
    }
}
