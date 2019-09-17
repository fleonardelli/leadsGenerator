<?php


namespace App\Controller\Api;
use App\Entity\AcademicOffer;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;

/**
 * Class AcademicOfferController
 * @package App\Controller\Api
 */
class AcademicOfferController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/academicOffers")
     *
     * @return Response
     */
    public function getAcamicOffersAction(): Response
    {
        $repository=$this->getDoctrine()->getRepository(AcademicOffer::class);
        $movies=$repository->findall();
        return $this->handleView($this->view($movies));
    }

    /**
     * @Rest\Get("/academicOffer/{academicOffer}")
     *
     * @return Response
     */
    public function getAcamicOfferAction(AcademicOffer $academicOffer): Response
    {
        return $this->handleView($this->view($academicOffer));
    }

}
