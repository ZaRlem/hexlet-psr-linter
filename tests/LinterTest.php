<?php

namespace hexletPsrLinter;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $name = 'Best linter';
        $linter = new Linter($name);
        $this->assertEquals($name, $linter->getName());
    }
}
