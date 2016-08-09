<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use HexletPsrLinter\Checker\FunctionChecker;

class NodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];

    public function leaveNode(Node $node)
    {
        $checker = new FunctionChecker;
        if ($checker->isAcceptable($node)) {
            $checker->validate($node);
            $this->errors[] = $checker->getErrors();
        }
    }
    public function getErrors()
    {
        if (!empty($this->errors[0])) {
            return $this->errors;
        }
    }
}
