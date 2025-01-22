<?php

/*
 * This file is part of the Fidry\Console package.
 *
 * (c) Théo FIDRY <theo.fidry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare (strict_types=1);
namespace PPLCZVendor\Fidry\Console\Test;

use PPLCZVendor\Fidry\Console\Application\Application as ConsoleApplication;
use PPLCZVendor\Fidry\Console\Application\SymfonyApplication;
use PPLCZVendor\Fidry\Console\DisplayNormalizer;
use PPLCZVendor\Symfony\Component\Console\Tester\ApplicationTester;
/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AppTester extends ApplicationTester
{
    public static function fromConsoleApp(ConsoleApplication $application) : self
    {
        return new self(new SymfonyApplication($application));
    }
    /**
     * @param callable(string):string $extraNormalizers
     */
    public function getNormalizedDisplay(callable ...$extraNormalizers) : string
    {
        return DisplayNormalizer::removeTrailingSpaces($this->getDisplay(), ...$extraNormalizers);
    }
}
