<?php

namespace HexletPsrLinter\Checker;

class SideEffectsChecker implements CheckerInterface
{
    private $errors = [];

    public function validate($node)
    {
            $this->errors = [0,
            'Warning',
            'Declaration of symbols and side effects in one file'];
    }
    public function getErrors()
    {
        if (!empty($this->errors)) {
            return $this->errors;
        }
    }
}
