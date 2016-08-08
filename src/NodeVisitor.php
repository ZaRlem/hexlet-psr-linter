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
            if ($checker->validate($node)) {
                $this->errors[] = $checker->validate($node);
            }
        }
    }
    public function getErrors()
    {
        return $this->errors;
    }
}
