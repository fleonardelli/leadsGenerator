<?php


namespace App\Controller\Api;

use App\Entity\AcademicOffer;
use App\Entity\Lead;
use App\Entity\Student;
use App\Service\CustomSerializer;
use App\Service\LeadService;
use App\Validations\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class LeadController
 *
 * @package App\Controller\Api
 */
class LeadController extends AbstractCustomController
{
    /** @var ValidatorInterface  */
    private $validator;

    public function __construct(CustomSerializer $serializer, ValidatorInterface $validator)
    {
        $this->validator = $validator;
        parent::__construct($serializer);
    }

    /**
     * @Rest\Post("/lead", name="createLead")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function createLead(Request $request, LeadService $leadService): Response
    {
        $data = json_decode($request->getContent(), true);

        $this->validator->validateCreation($data);

        if (!$this->validator->isValid()) {
            return $this->serializedJsonResponse($this->validator->getErrors(), 400);
        }

        try {
            $lead = $leadService->createLeadEntity($data);
        } catch (EntityNotFoundException $e) {

            return $this->serializedJsonResponse($e->getMessage(), 404);
        }

        return $this->serializedJsonResponse($lead);
    }
}
