<?php

namespace HexletPsrLinter;

function printErrors($path, $errors)
{
    if (!$errors) {
        echo "\n File: $path is valide \n";
        return true;
    }
    if (is_array($errors) && !empty($errors)) {
        echo "\n File: $path \n \n";
        foreach ($errors as $row) {
            if (is_array($row) && !empty($row)) {
                foreach ($row as $value) {
                    if (is_int($value)) {
                        printf("%5d", $value);
                    } else {
                        echo "    $value";
                    }
                }
            }
            echo "\n";
        }
        echo "\n";
        echo "Total problems: " . count($errors);
        echo "\n";
    }
}
