<?php
require_once '../vendor/autoload.php';

use KyoheiHarada\ComposerTutorial\Hoge;

$hoge = new Hoge();

print($hoge->public_property);

$hoge->StaticFunc();
$hoge->PublicFunc();
