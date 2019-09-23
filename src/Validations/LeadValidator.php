<?php


namespace App\Validations;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Exception\ValidatorException;

class LeadValidator extends CustomValidator implements ValidatorInterface
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function validateCreateAction(Request $request): void
    {
        $constraint = new Assert\Collection([
            'student-id' => new Assert\Type("int"),
            'academic-offer-id' => new Assert\Type("int"),
            'portal' => new Assert\Type("string")
        ]);

        $violations = $this->validate($request, $constraint);

        if (!empty($violations)) {

            $message = '';
            foreach ($violations as $key => $violation) {
                foreach ($violation as $violationMessage) {
                    $message .= "{$key}: {$violationMessage}";
                }
            }

            throw new ValidatorException($message);
        }
    }
}
