<?php

namespace HexletPsrLinter\Checker;

use PhpParser\Node;

interface CheckerInterface
{
  public function isAcceptable($node);
  public function validate($node);
}
