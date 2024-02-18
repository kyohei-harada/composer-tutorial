<?php

declare(strict_types=1);

namespace KyoheiHarada\ComposerTutorial;

class Hoge
{
    private string $private_property;
    public string $public_property;

    /**
     * Undocumented function
     *
     * @param string $private_property
     * @param string $public_property
     */
    public function __construct(string $private_property = "private", string $public_property = "public")
    {
        $this->private_property = $private_property;
        $this->public_property = $public_property;
        print(__FUNCTION__ . PHP_EOL);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function StaticFunc(): void
    {
        print(__FUNCTION__ . PHP_EOL);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function PrivateFunc(): void
    {
        print(__FUNCTION__ . ": " . $this->private_property . PHP_EOL);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function PublicFunc(): void
    {
        print(__FUNCTION__ . ": " . $this->public_property . PHP_EOL);
        $this->PrivateFunc();
    }
}
