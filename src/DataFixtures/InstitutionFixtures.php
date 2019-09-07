<?php

namespace App\DataFixtures;

use App\Entity\AcademicOffer;
use App\Entity\Institution;
use App\Entity\InstitutionType;

class InstitutionFixtures extends BaseFixture
{
    /**
     *
     */
    public function loadData()
    {
        $this->createMany(
            Institution::class,
            10,
            function(Institution $institution) {
                $institutionTypes = $this->manager
                    ->getRepository(InstitutionType::class)
                    ->findAll();

                $academicOffers = $this->manager
                    ->getRepository(AcademicOffer::class)
                    ->findAll();

                $institution->setName($this->faker->domainName)
                    ->setPhone($this->faker->phoneNumber)
                    ->setEmail($this->faker->email)
                    ->setAddress($this->faker->address)
                    ->setInstitutionType($institutionTypes[array_rand($institutionTypes)])
                    ->setLeadPrice($this->faker->randomFloat())
                    ->setActive(1);
            }
        );
    }
}
