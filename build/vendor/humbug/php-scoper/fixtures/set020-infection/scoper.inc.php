<?php

declare (strict_types=1);
namespace PPLCZVendor;

use PPLCZVendor\Isolated\Symfony\Component\Finder\Finder;
$polyfillsBootstraps = \array_map(static fn(\SplFileInfo $fileInfo) => $fileInfo->getPathname(), \iterator_to_array(Finder::create()->files()->in(__DIR__ . '/vendor/symfony/polyfill-*')->name('bootstrap*.php'), \false));
$polyfillsStubs = \array_map(static fn(\SplFileInfo $fileInfo) => $fileInfo->getPathname(), \iterator_to_array(Finder::create()->files()->in(__DIR__ . '/vendor/symfony/polyfill-*/Resources/stubs')->name('*.php'), \false));
return ['exclude-namespaces' => ['Composer', 'PPLCZVendor\\Symfony\\Polyfill'], 'exclude-constants' => [
    // Symfony global constants
    '/^SYMFONY\\_[\\p{L}_]+$/',
], 'exclude-files' => [...$polyfillsBootstraps, ...$polyfillsStubs]];
