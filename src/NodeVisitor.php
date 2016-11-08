<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use HexletPsrLinter\Checker\FunctionChecker;
use HexletPsrLinter\Checker\VarChecker;
use function HexletPsrLinter\Checker\check;

class NodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];
    private $sideEffectsFlag = false;

    public function leaveNode(Node $node)
    {
        if ($error = check($node)) {
            $this->errors[] = $error;
        }
    }

    public function getErrors()
    {
        if (!empty($this->errors)) {
            return $this->errors;
        }
    }
}
