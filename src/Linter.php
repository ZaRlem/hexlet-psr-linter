<?php

namespace HexletPsrLinter;

use PhpParser\Error;
use PhpParser\ParserFactory;
use PhpParser\NodeTraverser;
use HexletPsrLinter\MyNodeVisitor;

function lint($code)
{
    $errors = [];

    $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
    $traverser = new NodeTraverser;
    $nodeVisitor = new NodeVisitor;
    $traverser->addVisitor($nodeVisitor);
    try {
        $stmts = $parser->parse($code);
        $stmts = $traverser->traverse($stmts);
        $errors = $nodeVisitor->getErrors();
    } catch (Error $e) {
        $errors[] = "Parse Error: , $e->getMessage()";
    }
    return $errors;
}
