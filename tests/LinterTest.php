<?php

namespace HexletPsrLinter\Tests;

use function HexletPsrLinter\lint;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function testFuncChecker()
    {
        $rightCode = '
            <?php
            function getAmount()
            {
                return $amount;
            }';
        $wrongCode = '
            <?php
            function get_Amount()
            {
                return $amount;
            }';
        $this->assertNull(lint($rightCode));
        $this->assertContains([3,
            'Warning',
            'Function names must be declared in camelCase.'],
            lint($wrongCode));
    }
    public function testVarChecker()
    {
        $rightCode = '
            <?php
            function getAmount()
            {
                return $amount;
            }';
        $wrongCode = '
            <?php
            function getAmount()
            {
                return $am_ount;
            }';
        $this->assertNull(lint($rightCode));
        $this->assertContains([5,
            'Warning',
            'Variable names must be declared in camelCase.'],
            lint($wrongCode));
    }
    public function testSideEffectsChecker()
    {
        $rightCode = '
        <?php
        function foo()
        {
            // function body
        }
        if (! function_exists("bar")) {
            function bar()
            {
                // function body
            }
        }
        ';
        $wrongCode = '
        <?php
        ini_set("error_reporting", E_ALL);
        include "file.php";
        echo "<html>\n";
        function foo()
            {
                // function body
            }
        ';
        $this->assertNull(lint($rightCode));
        $this->assertContains([0,
            'Warning',
            'Declaration of symbols and side effects in one file'],
            lint($wrongCode));
    }
}
