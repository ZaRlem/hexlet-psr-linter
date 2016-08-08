<?php

namespace HexletPsrLinter;

use Commando;

function getFilePath()
{
    $cmd = new Commando\Command();
    $cmd
        ->argument()
            ->expectsFile();

    return $cmd->getArgumentValues();
}
