<?php

declare(strict_types=1);

namespace KyoheiHarada\ComposerTutorial;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleCommand extends Command
{
    protected function configure(): void
    {
        $this->setDefinition([
            new InputOption('flag1', 'f', InputOption::VALUE_NONE, 'Flag1'),
            new InputOption('flag2', null, InputOption::VALUE_NEGATABLE, 'Flag2'),
            new InputOption('flag3', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'Flag3'),
            new InputOption('flag4', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Flag4', ["hoge","fuga"]),
            new InputArgument('args', InputArgument::OPTIONAL, 'Optional args'),
        ]);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Options: ");
        foreach ($input->getOptions() as $k => $v) {
            $output->writeln("$k: " . $this->strigify($v));
        }
        $output->writeln("");

        $output->writeln("Arguments: ");
        foreach ($input->getArguments() as $k => $v) {
            $output->writeln("$k: " . $this->strigify($v));
        }
        return 0;
    }

    /**
     * @param string|boolean|integer|float|array<string>|null $value
     * @return string
     */
    private function strigify(string|bool|int|float|array|null $value): string
    {
        if (is_string($value)) {
            return $value;
        } elseif (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_int($value) || is_float($value)) {
            return (string) $value;
        } elseif (is_array($value)) {
            return (count($value) > 0) ? implode(', ', $value) : 'empty array';
        } elseif (is_null($value)) {
            return 'null';
        } else {
            return 'unknown';
        }
    }
}
