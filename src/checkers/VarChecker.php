<?php

namespace HexletPsrLinter\Checker;

class VarChecker implements CheckerInterface
{
    private $errors = [];

    public function validate($node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            $this->errors = [$node->getLine(),
                'Warning',
                'Variable names must be declared in camelCase.'];
        } else {
            return true;
        }
    }
    public function getErrors()
    {
        if (!empty($this->errors)) {
            return $this->errors;
        }
    }
}
