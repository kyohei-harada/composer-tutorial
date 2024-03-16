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
        $COMPOSER_JSON_CONTENT = file_get_contents($COMPOSER_JSON_PATH);
        if ($COMPOSER_JSON_CONTENT) {
            $extra = json_decode($COMPOSER_JSON_CONTENT, true)['extra'];
        } else {
            throw new Exception("Can't read composer.json file.");
        }

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
