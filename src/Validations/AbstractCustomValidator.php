<?php


namespace App\Validations;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;

abstract class AbstractCustomValidator implements ValidatorInterface
{
    /** @var bool */
    private $isValid;

    /** @var array */
    private $errors;

    /**
     * @param Request           $request
     * @param Assert\Collection $constraint
     *
     * @return void
     */
    public function validate(Request $request, Assert\Collection $constraint): void
    {
        $this->isValid = true;
        $this->errors = [];

        $parameters = $request->query->all();

        $validator = Validation::createValidator();

        $violations = $validator->validate($parameters, $constraint);

        if ($violations) {
            $this->isValid = false;

            foreach ($violations as $violation) {
                /** @var ConstraintViolation $violation */
                $field = substr($violation->getPropertyPath(), 1, -1);
                $this->errors[$field][] = $violation->getMessage();
            }
        }
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
