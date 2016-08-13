<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use HexletPsrLinter\Checker\FunctionChecker;
use HexletPsrLinter\Checker\VarChecker;

class NodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];

    public function leaveNode(Node $node)
    {
        if ($node instanceof \PhpParser\Node\Expr\Variable) {
            $checker = new VarChecker;
        } elseif ($node instanceof \PhpParser\Node\Stmt\Function_
            || $node instanceof \PhpParser\Node\Stmt\ClassMethod) {
            $checker = new FunctionChecker;
        }
        if (isset($checker)) {
            if (!$checker->validate($node)) {
                $this->errors[] = $checker->getErrors();
            }
        }
    }
    public function getErrors()
    {
        if (!empty($this->errors)) {
            return $this->errors;
        }
    }
}
