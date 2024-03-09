<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use KyoheiHarada\ComposerTutorial\Hoge;

$hoge = new Hoge();

print($hoge->public_property . PHP_EOL);

print($hoge->StaticFunc() . PHP_EOL);

$name = "kyohei";
print($hoge->Greeting($name) . PHP_EOL);

print($hoge->Sum(1,2) . PHP_EOL);

print($hoge->GetPrivateProperty() . PHP_EOL);
