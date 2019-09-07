<?php

namespace App\DataFixtures;

use App\Entity\AcademicOffer;
use App\Entity\CourseMode;
use App\Entity\Institution;
use App\Entity\OfferType;
use App\Entity\TematicArea;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AcademicOfferFixtures extends BaseFixture implements DependentFixtureInterface
{
    /**
     *
     */
    public function loadData()
    {
        $this->createMany(
            AcademicOffer::class,
            10,
            function(AcademicOffer $academicOffer) {
                $tematicAreas = $this->manager
                    ->getRepository(TematicArea::class)
                    ->findAll();

                $offerTypes = $this->manager
                    ->getRepository(OfferType::class)
                    ->findAll();

                $institutions = $this->manager
                    ->getRepository(Institution::class)
                    ->findAll();

                $courseModes = $this->manager
                    ->getRepository(CourseMode::class)
                    ->findAll();

                $academicOffer->setName($this->faker->jobTitle)
                    ->setCoursePlace($this->faker->address)
                    ->setDescription($this->faker->text)
                    ->setDuration($this->faker->randomFloat())
                    ->setInstitution($institutions[array_rand($institutions)])
                    ->setOfferType($offerTypes[array_rand($offerTypes)])
                    ->setTematicArea($tematicAreas[array_rand($tematicAreas)])
                    ->setTimeTable('Lunes, Miercoles y Viernes')
                    ->setActive($this->faker->boolean)
                    ->addCourseMode($courseModes[array_rand($courseModes)]);
            }
        );
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            InstitutionFixtures::class,
        );
    }

}
