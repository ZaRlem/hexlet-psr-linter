<?php

namespace HexletPsrLinter\Checker;

use PhpParser\Node;

interface CheckerInterface
{
    public function validate($node);
    public function getErrors();
}
