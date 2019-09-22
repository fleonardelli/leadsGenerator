<?php


namespace App\Controller\Api;

use App\Service\CustomSerializer;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

class AbstractCustomController extends AbstractFOSRestController
{
    /** @var CustomSerializer */
    private $serializer;

    public function __construct(CustomSerializer $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function serializedJsonResponse(
        array $content = [],
        int $status = 200,
        array $headers = [])
    {

        return new Response(
            $this->serializer->serialize($content),
            $status,
            $headers
        );
    }
}
