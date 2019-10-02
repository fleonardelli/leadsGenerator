<?php

namespace App\Validations;

use Symfony\Component\HttpFoundation\Request;

interface ValidatorInterface
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function validateCreateAction(Request $request): void;

    /**
     * @return bool
     */
    public function isValid(): bool;

    /**
     * @return array
     */
    public function getErrors(): array;

}
