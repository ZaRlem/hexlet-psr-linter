<?php

namespace HexletPsrLinter;
require_once __DIR__ . '/../vendor/autoload.php';

class LinterTest extends \PHPUnit_Framework_TestCase
{
    private $pathRightFile = "/tests/fixtures/rigthCase.php";
    private $pathWrongFile = "/tests/fixtures/wrongCase.php";

    public function readFile($path)
    {
       if(file_exists($path)){
       return file_get_contents($path);
       } else {
        return false;
       }
    }
     public function testLinter(){
       $wrongCode = $this->readFile($this->pathRightFile);
       $rightCode = $this->readFile($this->pathWrongFile);
       $linter1 = new Linter($wrongCode);
       $this->assertTrue($linter1->validate());

       $linter2 = new Linter($rightCode);
       $this->assertTrue($linter2->validate());
     }
}
