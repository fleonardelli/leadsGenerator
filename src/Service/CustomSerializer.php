<?php

namespace App\Service;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

class CustomSerializer
{

    public function serialize(array $data): string
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->enableMaxDepthChecks()
        );
    }
}
