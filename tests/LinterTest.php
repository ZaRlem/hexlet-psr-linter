<?php

require_once __DIR__ . '/../vendor/autoload.php';

use function HexletPsrLinter\lint;


class LinterTest extends \PHPUnit_Framework_TestCase
{
    private $pathRightFile = __DIR__ . "/fixtures/rightCase.php";
    private $pathWrongFile = __DIR__ . "/fixtures/rightCase.php";

    public function testLinter(){
    //$wrongCode = file_get_contents($this->pathRightFile);
    //$rightCode = file_get_contents($this->pathWrongFile);

    $wrongCode = '<?php function get_Amount() {  return amount;} function negate(){
        return new Money(-1 * amount);
    }';
    $rirhtCode = '<?php function getAmount() {  return amount;} function negate(){
        return new Money(-1 * amount);
    }';

    $this->assertEquals('Method names MUST be declared in camelCase.', lint($wrongCode));
    $this->assertEquals(null, lint($rirhtCode));
    }
}
