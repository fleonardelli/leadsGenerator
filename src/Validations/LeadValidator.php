<?php


namespace App\Validations;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;

class LeadValidator extends AbstractCustomValidator
{

    /**
     * @param Request $request
     *
     * @return void
     */
    protected function getCreationDataRules(): Assert\Collection
    {
        return new Assert\Collection([
            'student-id' => new Assert\Type("int"),
            'academic-offer-id' => new Assert\Type("int"),
            'portal' => new Assert\Type("string"),
            'message' => [new Assert\Optional( new Assert\Type("string"))]
        ]);
    }
}
