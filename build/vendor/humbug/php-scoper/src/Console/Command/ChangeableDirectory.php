<?php

declare (strict_types=1);
/*
 * This file is part of the humbug/php-scoper package.
 *
 * Copyright (c) 2017 Théo FIDRY <theo.fidry@gmail.com>,
 *                    Pádraic Brady <padraic.brady@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PPLCZVendor\Humbug\PhpScoper\Console\Command;

use PPLCZVendor\Fidry\Console\Input\IO;
use InvalidArgumentException;
use PPLCZVendor\Symfony\Component\Console\Exception\RuntimeException;
use PPLCZVendor\Symfony\Component\Console\Input\InputOption;
use function chdir as native_chdir;
use function file_exists;
use function PPLCZVendor\Safe\getcwd;
use function PPLCZVendor\Safe\sprintf;
/**
 * @private
 * @codeCoverageIgnore
 */
final class ChangeableDirectory
{
    private const WORKING_DIR_OPT = 'working-dir';
    private function __construct()
    {
    }
    public static function createOption() : InputOption
    {
        return new InputOption(self::WORKING_DIR_OPT, 'd', InputOption::VALUE_REQUIRED, 'If specified, use the given directory as working directory.', null);
    }
    public static function changeWorkingDirectory(IO $io) : void
    {
        $workingDir = $io->getOption(self::WORKING_DIR_OPT)->asNullableString();
        if (null === $workingDir) {
            return;
        }
        if (!file_exists($workingDir)) {
            throw new InvalidArgumentException(sprintf('Could not change the working directory to "%s": directory does not exists.', $workingDir));
        }
        if (!native_chdir($workingDir)) {
            throw new RuntimeException(sprintf('Failed to change the working directory to "%s" from "%s".', $workingDir, getcwd()));
        }
    }
}
