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
    }

    /**
     * Return "static" string
     *
     * @return string
     */
    public static function StaticFunc(): string
    {
        return "static";
    }

    /**
     * You can say hello back
     *
     * @return string
     */
    public function Greeting(string $name): string
    {
        return "Hello, " . $name . ".";
    }

    /**
     * Return sum of two numbers
     *
     * @param integer $n1
     * @param integer $n2
     * @return integer
     */
    public function Sum(int $n1, int $n2): int
    {
        return ($n1 + $n2);
    }

    /**
     * Return Private Property
     *
     * @return string
     */
    public function GetPrivateProperty(): string
    {
        return $this->private_property;
    }
}
