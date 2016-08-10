<?php

namespace HexletPsrLinter\Tests;

use function HexletPsrLinter\lint;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function testLinter()
    {
        $wrongCode = '
          <?php
          function get_Amount()
          {
            return amount;
          }
          function negate()
          {
          return new Money(-1 * amount);
          };';
        $rightCode = '
          <?php
          function getAmount()
          {
            return amount;
          }
          function negate()
          {
          return new Money(-1 * amount);
          };';

        $this->assertTrue(!empty(lint($wrongCode)));
        $this->assertTrue(empty(lint($rightCode)));
    }
}
