<?php

namespace Idecardo\LaravelUIInstaller;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class InstallCommand extends Command
{
    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('install')
            ->setDescription('Install Laravel UI scaffolding')
            ->addArgument('preset', InputArgument::REQUIRED, 'Install the preset type')
            ->addOption('auth', null, InputOption::VALUE_NONE, 'Install authentication scaffolding');
    }

    /**
     * Execute the command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $preset = $input->getArgument('preset');

        if (! in_array($preset, ['tailwind'])) {
            throw new InvalidArgumentException('Invalid preset.');
        }

        call_user_func([__NAMESPACE__.'\\Presets\\'.$preset, 'install'], $output);

        if ($input->getOption('auth')) {
            call_user_func([__NAMESPACE__.'\\Presets\\'.$preset, 'auth'], $output);
        }

        $output->writeln(sprintf('<info>%s scaffolding installed successfully.</info>', ucfirst($preset)));
        $output->writeln('<comment>Please run "npm install && npm run dev" to compile your fresh scaffolding.</comment>');

        return 0;
    }
}
