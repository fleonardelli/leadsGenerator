<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Common\Persistence\ObjectManager;

class StudentFixtures extends BaseFixture
{

    public function loadData(ObjectManager $manager)
    {
        $this->createMany(
            Student::class,
            10,
            function(Student $student, $count) {
                $student->setName($this->faker->name)
                        ->setEmail($this->faker->email)
                        ->setPhone($this->faker->phoneNumber)
                        ->setSurname($this->faker->lastName);
            }
        );
    }
}
