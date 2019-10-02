<?php


namespace App\Validations;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Exception\ValidatorException;

class LeadValidator extends AbstractCustomValidator
{
    /**
     * @param Request $request
     *
     * @return void
     */
    public function validateCreateAction(Request $request): void
    {
        $constraint = new Assert\Collection([
            'student-id' => new Assert\Type("integer"),
            'academic-offer-id' => new Assert\Type("int"),
            'portal' => new Assert\Type("string"),
            'message' => [new Assert\Optional( new Assert\Type("string"))]
        ]);

        $this->validate($request, $constraint);
    }
}
