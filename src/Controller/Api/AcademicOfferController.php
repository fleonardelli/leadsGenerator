<?php


namespace App\Controller\Api;
use App\Entity\AcademicOffer;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AcademicOfferController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/academicOffer/{academicOffer}")
     *
     * @ParamConverter("academicOffer", class=AcademicOffer::class)
     */
    public function getArticle(AcademicOffer $academicOffer): View
    {
        return View::create($academicOffer, Response::HTTP_OK);
    }

}
