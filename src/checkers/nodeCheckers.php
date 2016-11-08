<?php

namespace HexletPsrLinter\Checker;

use PhpParser\Node;
use function HexletPsrLinter\Checker\getCheckersList;

function check(Node $node)
{
    $sideEffectsFlag = false;
    $checkerList = getCheckersList();

    foreach ($checkerList as $key => $value) {
        if ($node instanceof $key) {
            $checker = new $value;
        }
    }

    if (isset($checker)) {
        if (!$checker->validate($node)) {
            return $checker->getErrors();
        }
    }
}
