#!/usr/bin/env php
<?php

use RPurinton\{Log, Config};

require __DIR__ . '/vendor/autoload.php';

// testing static method.

Log::install();

$config = Config::get("Test",[
    "var1" => "string",
    "var2" => "integer",
    "var3" => "double",
    "var4" => "bool",
    "var5" => [
        "var51" => "integer",
        "var52" => "double",
        "var53" => myValidator(...),
    ]
]);

$config = Config::open("Test");
$config->config['var6'] = 6;
$config->save();

$config = Config::get("Test");
if($config['var6'] !== 6) die("Failure of open/save method\n");

$config = Config::open("Test");
unset($config->config['var6']);
$config->save();

// test override
$config = Config::get(["var1" => true],["var1" => myValidator(...)]);

echo("OK!\n");


function myValidator(bool $input): bool
{
        return $input;
}

