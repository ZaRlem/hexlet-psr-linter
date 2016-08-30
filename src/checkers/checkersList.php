<?php

namespace HexletPsrLinter\Checker;

function getCheckersList()
{
    return [
        '\PhpParser\Node\Expr\Include_' => 'HexletPsrLinter\Checker\SideEffectsChecker',
        '\PhpParser\Node\Stmt\Echo_' => 'HexletPsrLinter\Checker\SideEffectsChecker',
        '\PhpParser\Node\Stmt\Function_' => 'HexletPsrLinter\Checker\FunctionChecker',
        '\PhpParser\Node\Stmt\ClassMethod' => 'HexletPsrLinter\Checker\FunctionChecker',
        '\PhpParser\Node\Expr\Variable' => 'HexletPsrLinter\Checker\VarChecker'
    ];
}
