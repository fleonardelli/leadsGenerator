<?php


namespace App\Service;

use App\Entity\AcademicOffer;
use App\Entity\Lead;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;

/**
 * Class LeadService
 *
 * @package App\Service
 */
class LeadService
{
    /** @var EntityManagerInterface  */
    protected $em;

    /**
     * LeadService constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param array $data
     *
     * @return Lead
     * @throws EntityNotFoundException
     */
    public function createLeadEntity(array $data): Lead
    {
        /** @var AcademicOffer|null $academicOffer */
        $academicOffer = $this->em->getRepository(AcademicOffer::class)
            ->find($data['academic-offer-id']);

        if (null === $academicOffer) {
            throw new EntityNotFoundException(
                "Academic Offer id {$data['academic-offer-id']} not found"
            );
        }

        /** @var Student|null $student */
        $student = $this->em->getRepository(Student::class)
            ->find($data['student-id']);

        if (null === $student) {
            throw new EntityNotFoundException(
                "Student id {$data['academic-offer-id']} not found"
            );
        }

        $lead = new Lead();
        $lead->setAcademicOffer($academicOffer)
            ->setStudent($student)
            ->setFromPortal($data['portal']);

        if (isset($data['message'])) {
            $lead->setMessage($data['message']);
        }

        $this->em->persist($lead);
        $this->em->flush();

        return $lead;
    }
}
