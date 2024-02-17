<?php

namespace KyoheiHarada\ComposerTutorial;

class Hoge
{
    private $private_property;
    public $public_property;

    public function __construct(string $private_property = "private", string $public_property = "public")
    {
        $this->private_property = $private_property;
        $this->public_property = $public_property;
        print(__FUNCTION__ . PHP_EOL);
    }

    public static function StaticFunc(): void
    {
        print(__FUNCTION__ . PHP_EOL);
    }

    private function PrivateFunc(): void
    {
        print(__FUNCTION__ . ": " . $this->private_property . PHP_EOL);
    }

    public function PublicFunc(): void
    {
        print(__FUNCTION__ . ": " . $this->public_property . PHP_EOL);
        $this->PrivateFunc();
    }
}
