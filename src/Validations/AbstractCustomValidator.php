<?php


namespace App\Validations;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

abstract class AbstractCustomValidator implements ValidatorInterface
{
    /** @var bool */
    private $isValid;

    /** @var array */
    private $errors;

    abstract protected function getCreationDataRules(): Assert\Collection;

    /**
     *
     */
    public function initialize(): void
    {
        $this->isValid = true;
        $this->errors = [];
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

    /**
     * @param array $data
     */
    public function validateCreation(array $data): void
    {
        $this->initialize();
        $constraint = $this->getCreationDataRules();
        $this->validateData($data, $constraint);
    }

    /**
     * @param Request           $request
     * @param Assert\Collection $constraint
     *
     * @return void
     */
    private function validateData(array $data, Assert\Collection $constraint): void
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($data, $constraint);
        $this->setErrors($violations);
    }

    /**
     * @param ConstraintViolationListInterface $violations
     */
    private function setErrors(ConstraintViolationListInterface $violations): void
    {
        if ($violations->count()) {
            $this->isValid = false;

            foreach ($violations as $violation) {
                /** @var ConstraintViolation $violation */
                $field = substr($violation->getPropertyPath(), 1, -1);
                $this->errors[$field][] = $violation->getMessage();
            }

        }
    }
}
