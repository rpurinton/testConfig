<?php

use RPurinton\Config;

require __DIR__ . '/vendor/autoload.php';

$config = Config::get("Test",[
    "var1" => "string",
    "var2" => "integer",
    "var3" => "double",
    "var4" => "bool",
    "var5" => [
        "var51" => "integer",
        "var52" => "double",
        "var53" => "bool",
    ]
]);

print_r($config);
