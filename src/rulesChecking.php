<?php
namespace HexletPsrLinter;

function checkFuncName($funcName)
{
    //CamelCase checking
    if (!\PHP_CodeSniffer::isCamelCaps($funcName)) {
        return 'Method names MUST be declared in camelCase.';
    }
}
