<?php

namespace HexletPsrLinter;

function printErrors($path, $errors)
{
      echo "\n File: $path \n \n";

    if ($errors) {
        foreach ($errors as $row) {
            foreach ($row as $value) {
                if (is_int($value)) {
                    printf("%5d", $value);
                } else {
                    echo "    $value";
                }
            }
            echo "\n";
        }
        echo "\n";
        echo "Total problems: " . count($errors);
        echo "\n";
    }
}
