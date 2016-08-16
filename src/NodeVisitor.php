<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use HexletPsrLinter\Checker\FunctionChecker;
use HexletPsrLinter\Checker\VarChecker;

class NodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];
    private $sideEffectsFlag = false;

    public function leaveNode(Node $node)
    {

        if ($node instanceof \PhpParser\Node\Expr\Variable) {
            $checker = new VarChecker;
        } elseif ($node instanceof \PhpParser\Node\Stmt\Function_
            || $node instanceof \PhpParser\Node\Stmt\ClassMethod) {
            $checker = new FunctionChecker;
        } elseif ($node instanceof \PhpParser\Node\Expr\Include_
            || $node instanceof \PhpParser\Node\Stmt\Echo_) {
                $this->sideEffectsFlag = true;
        }
        if (isset($checker)) {
            if (($checker instanceof FunctionChecker) && $this->sideEffectsFlag) {
                $this->errors[] = [0,
                    'Warning',
                    'Declaration of symbols and side effects in one file'];
            }
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
