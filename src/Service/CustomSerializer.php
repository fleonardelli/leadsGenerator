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
        //TODO: En constructor o extender de JMSerializer o recibirlo por DI
        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->enableMaxDepthChecks()
        );
    }
}
