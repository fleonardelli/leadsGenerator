<?php

namespace App\DataFixtures;

use App\Entity\AcademicOffer;
use App\Entity\Lead;
use App\Entity\Student;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LeadFixtures extends BaseFixture implements DependentFixtureInterface
{
    /**
     *
     */
    public function loadData()
    {
        $this->createMany(
            Lead::class,
            10,
            function(Lead $lead) {
                $academicOffers = $this->manager
                    ->getRepository(AcademicOffer::class)
                    ->findAll();

                $students = $this->manager
                    ->getRepository(Student::class)
                    ->findAll();

                $lead->setAcademicOffer($academicOffers[array_rand($academicOffers)])
                    ->setCreatedAt($this->faker->dateTime)
                    ->setGotFromCrm($this->faker->boolean)
                    ->setPortal($this->faker->url)
                    ->setSentByEmail($this->faker->boolean)
                    ->setStudent($students[array_rand($students)]);
            }
        );
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            AcademicOfferFixtures::class,
        );
    }

}
