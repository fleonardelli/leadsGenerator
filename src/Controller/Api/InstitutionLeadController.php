<?php

namespace App\Controller\Api;

use App\Entity\AcademicOffer;
use App\Entity\Institution;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InstitutionLeadController
 *
 * @package App\Controller\Api
 */
class InstitutionLeadController extends AbstractCustomController
{

    /**
     * @Rest\Get("/institution/{institutionId}/leads")
     *
     * @return Response
     */
    public function getInstitutionLeads(
        $institutionId,
        EntityManagerInterface $entityManager
    ): Response
    {
        $repository = $entityManager->getRepository(Institution::class);

        $academicOffers = $repository->find($institutionId)->getAcademicOffers();

        $academicOfferLeads = [];
        foreach ($academicOffers as $academicOffer) {
            /** @var AcademicOffer $academicOffer */
            if ($academicOffer->getUnsentLeads()->count()) {
                $academicOfferLeads[$academicOffer->getName()] = $academicOffer->getUnsentLeads();
            }
        }

        return $this->serializedJsonResponse(
            $academicOfferLeads
        );
    }

}
