<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use KyoheiHarada\ComposerTutorial\Hoge;

/**
 * @covers \KyoheiHarada\ComposerTutorial\Hoge
 */
final class HogeTest extends TestCase
{
    protected Hoge $hoge;

    protected function setUp(): void
    {
        $this->hoge = new Hoge();
    }

    public function test__construct(): void
    {
        $public_property = $this->hoge->public_property;
        $this->assertSame("public", $public_property);
    }

    public function testStaticFunc(): void
    {
        $static = $this->hoge->StaticFunc();
        $this->assertSame("static", $static);
    }

    public function testGreeting(): void
    {
        $name = "kyohei";
        $greeting = $this->hoge->Greeting($name);

        $this->assertSame("Hello, " . $name . ".", $greeting);
    }

    public function testSum(): void
    {
        $sum = $this->hoge->Sum(1, 2);
        $this->assertIsInt($sum);
        $this->assertSame(3, $sum);
    }

    public function testGetPrivateProperty(): void
    {
        $private_property = $this->hoge->GetPrivateProperty();
        $this->assertSame("private", $private_property);
    }
}
