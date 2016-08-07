<?php

namespace HexletPsrLinter;

class Linter
{

    public function __construct($code)
    {
        $this->code = $code;
    }
    public function validate()
    {
      return true;
    }
}
