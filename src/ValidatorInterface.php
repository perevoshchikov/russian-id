<?php

namespace Anper\IdValidation;

interface ValidatorInterface
{
    /**
     * @return bool
     */
    public function validate(): bool;
}
