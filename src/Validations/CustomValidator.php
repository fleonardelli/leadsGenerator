<?php


namespace App\Validations;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;

class CustomValidator
{

    /**
     * @param Request           $request
     * @param Assert\Collection $constraint
     *
     * @return array
     */
    public function validate(Request $request, Assert\Collection $constraint): array
    {
        $parameters = $request->query->all();

        $validator = Validation::createValidator();

        $violations = $validator->validate($parameters, $constraint);

        foreach ($violations as $violation) {
            /** @var ConstraintViolation $violation */
            $message[$violation->getPropertyPath()][] = $violation->getMessage();
        }

        return $message;
    }
}
