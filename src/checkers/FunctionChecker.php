<?php

namespace HexletPsrLinter\Checker;

class FunctionChecker implements CheckerInterface
{

    public function isAcceptable($node)
    {
        if ($node instanceof \PhpParser\Node\Stmt\Function_ ||
        $node instanceof \PhpParser\Node\Stmt\ClassMethod) {
            return true;
        }
    }
    public function validate($node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            $line = $node->getLine();
            $errorType = 'Warning';
            $errorText = 'Function names must be declared in camelCase.';
            return(compact('line', 'errorType', 'errorText'));
        }
    }
}
