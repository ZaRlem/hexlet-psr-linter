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
            
            return [$node->getLine(),
                'Warning',
                'Function names must be declared in camelCase.'];
        }
    }
}
