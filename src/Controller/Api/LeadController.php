<?php


namespace App\Controller\Api;

use App\Entity\AcademicOffer;
use App\Entity\Lead;
use App\Entity\Student;
use App\Service\CustomSerializer;
use App\Validations\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;
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
     * @Rest\Post("/lead")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function createLead(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $this->validator->validateCreateAction($request);

        $studentId = $request->get('student-id');
        $academicOfferId = $request->get('academic-offer-id');

        /** @var Student|null $student */
        $student = $entityManager
            ->getRepository(Student::class)
            ->find($studentId);

        if (null === $student) {

            throw $this->createNotFoundException("Student with id {$studentId} not found.");
        }

        /** @var AcademicOffer|null $academicOffer */
        $academicOffer = $entityManager
            ->getRepository(AcademicOffer::class)
            ->find($academicOfferId);

        if (null === $academicOffer) {

            throw $this->createNotFoundException("Academic offer with id {$academicOffer} not found.");
        }

        $lead = new Lead();
        $lead->setStudent($student)
            ->setAcademicOffer($academicOffer)
            ->setSentByEmail(0)
            ->setGotFromCrm(0)
            ->setCreatedAt(new \DateTime())
            ->setFromPortal($request->get('portal'));

        $entityManager->persist($lead);
        $entityManager->flush();

        return $this->serializedJsonResponse(
            $lead
        );
    }
}
