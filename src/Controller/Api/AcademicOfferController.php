<?php


namespace App\Controller\Api;
use App\Entity\AcademicOffer;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class AcademicOfferController
 * @package App\Controller\Api
 */
class AcademicOfferController extends AbstractCustomController
{
    /**
     * @Rest\Get("/academicOffers")
     *
     * @return Response
     */
    public function getAcamicOffersAction(): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(AcademicOffer::class);

        return $this->serializedJsonResponse(
            $repository->findAll(),
            200
        );
    }

    /**
     * @Rest\Get("/academicOffer/{academicOffer}")
     *
     * @return Response
     */
    public function getAcamicOfferAction(AcademicOffer $academicOffer): Response
    {
        return new Response();
    }

}
