<?php

declare (strict_types=1);
namespace PPLCZVendor;

use PPLCZVendor\PhpParser\NodeDumper;
use PPLCZVendor\PhpParser\ParserFactory;
use PPLCZVendor\Symfony\Component\Console\Application;
use PPLCZVendor\Symfony\Component\Console\Command\Command;
use PPLCZVendor\Symfony\Component\Console\Input\InputInterface;
use PPLCZVendor\Symfony\Component\Console\Output\OutputInterface;
require_once __DIR__ . '/vendor/autoload.php';
class HelloWorldCommand extends Command
{
    protected function configure()
    {
        $this->setName('hello:world')->setDescription('Outputs \'Hello World\'');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello world!');
    }
}
\class_alias('PPLCZVendor\\HelloWorldCommand', 'HelloWorldCommand', \false);
$command = new HelloWorldCommand();
$application = new Application();
$application->add($command);
$application->setDefaultCommand($command->getName());
$application->run();
