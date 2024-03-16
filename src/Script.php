<?php

declare(strict_types=1);

namespace KyoheiHarada\ComposerTutorial;

use Composer\Script\Event;

class Script
{
    /**
     * @param Event $event
     * @return void
     */
    public static function Echo(Event $event): void
    {
        print(implode(" ", $event->getArguments()) . PHP_EOL);
    }

    /**
     * @param Event $event
     * @return void
     */
    public static function DumpExtras(Event $event): void
    {
        foreach ($event->getComposer()->getPackage()->getExtra() as $k => $v) {
            print("{$k}: {$v}" . PHP_EOL);
        }
    }
}
