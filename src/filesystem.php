<?php

namespace HexletPsrLinter;

function getFilePathList($path)
{
    $funcIter = function ($path, $files) use (&$funcIter) {

        if (is_dir($path)) {
            $handle = opendir($path);
            while (false !== ($file = readdir($handle))) {
                if ($file === '.' || $file === '..') {
                    continue;
                } elseif (is_file($path . '/' . $file) &&
                 (pathInfo($path . '/' . $file)['extension'] == 'php')) {
                    $files[] = $path . '/' . $file;
                }
                if (is_dir($path . '/' . $file)) {
                    $files = array_merge($files, $funcIter($path . '/' . $file, []));
                }
            }
            closedir($handle);
        } elseif (pathInfo($path)['extension'] == 'php') {
            $files[] = $path;
        }
           return $files;
    };
    return $funcIter($path, []);
}
