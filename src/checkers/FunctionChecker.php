<?php

namespace HexletPsrLinter\Checker;

class FunctionChecker implements CheckerInterface
{
    private $errors = [];

    public function isAcceptable($node)
    {
        if($node instanceof \PhpParser\Node\Stmt\Function_){
          return true;
        }
    }
    public function validate($node)
    {
        if(!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            return 'Function names must be declared in camelCase.';
        }
    }
}
