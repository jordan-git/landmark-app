<?php

function read_env()
{
    $env_array = [];
    $file = fopen(__DIR__ . '/../../.env', 'r');

    if ($file) {
        while(($line = fgets($file)) !== false) {
            $split_line = explode('=', $line);
            $env_array[$split_line[0]] = $split_line[1];
        }
    }

    return $env_array;
}