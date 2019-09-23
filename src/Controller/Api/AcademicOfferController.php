<?php


namespace App\Controller\Api;
use App\Entity\AcademicOffer;
use Doctrine\ORM\EntityManagerInterface;
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
    public function getAcademicOffersAction(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(AcademicOffer::class);

        return $this->serializedJsonResponse(
            $repository->findAll()
        );
    }

    /**
     * @Rest\Get("/academicOffer/{academicOffer}")
     *
     * @return Response
     */
    public function getAcademicOfferAction(AcademicOffer $academicOffer): Response
    {
        return $this->serializedJsonResponse(
             $academicOffer
        );
    }

}
