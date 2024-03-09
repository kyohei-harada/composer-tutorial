<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use KyoheiHarada\ComposerTutorial\Script;
use Composer\Script\Event;
use Composer\Composer;
use Composer\Package\RootPackageInterface;

/**
 * @covers \KyoheiHarada\ComposerTutorial\Script
 */
final class ScriptTest extends TestCase
{
    protected Event $event;
    protected Composer $composer;
    protected RootPackageInterface $root_package_interface;

    public function setUp(): void
    {
        $COMPOSER_JSON_PATH = __DIR__ . '/../composer.json';
        $extra = json_decode(file_get_contents($COMPOSER_JSON_PATH), true)['extra'];

        $this->root_package_interface = $this->createStub(RootPackageInterface::class);
        $this->root_package_interface->method('getExtra')->willReturn($extra);

        $this->composer = $this->createStub(Composer::class);
        $this->composer->method('getPackage')->willReturn($this->root_package_interface);

        $this->event = $this->createStub(Event::class);
        $this->event->method('getComposer')->willReturn($this->composer);
        $this->event->method('getArguments')->willReturn(["hoge", "fuga"]);
    }

    public function testEcho(): void
    {
        $this->expectOutputString("hoge fuga\n");
        Script::Echo($this->event);
    }

    public function testDumpExtras(): void
    {
        $this->expectOutputString("extra1: value1\nextra2: value2\n");
        Script::DumpExtras($this->event);
    }
}
