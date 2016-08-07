<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use function HexletPsrLinter\checkFuncName;


class MyNodeVisitor extends NodeVisitorAbstract
{
    private $errors;

    public function leaveNode(Node $node)
    {
      if (($node instanceof \PhpParser\Node\Stmt\Function_) ||
            ($node instanceof Node\Stmt\ClassMethod)) {
          if(checkFuncName($node->name)){
            $this->errors = checkFuncName($node->name);
          }
      }
    }
    public function getErrors()
    {
      return $this->errors;
    }
}
