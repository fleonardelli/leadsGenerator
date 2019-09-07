<?php

namespace App\DataFixtures;

use App\Entity\Student;

class StudentFixtures extends BaseFixture
{
    /**
     *
     */
    public function loadData()
    {
        $this->createMany(
            Student::class,
            10,
            function(Student $student) {
                $student->setName($this->faker->name)
                        ->setEmail($this->faker->email)
                        ->setPhone($this->faker->phoneNumber)
                        ->setSurname($this->faker->lastName);
            }
        );
    }
}
