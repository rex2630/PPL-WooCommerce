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
namespace PPLCZVendor\Humbug\PhpScoper\Scoper;

use PPLCZVendor\Humbug\PhpScoper\Configuration\Configuration;
use PPLCZVendor\Humbug\PhpScoper\PhpParser\Printer\Printer;
use PPLCZVendor\Humbug\PhpScoper\PhpParser\TraverserFactory;
use PPLCZVendor\Humbug\PhpScoper\Scoper\Composer\AutoloadPrefixer;
use PPLCZVendor\Humbug\PhpScoper\Scoper\Composer\InstalledPackagesScoper;
use PPLCZVendor\Humbug\PhpScoper\Scoper\Composer\JsonFileScoper;
use PPLCZVendor\Humbug\PhpScoper\Symbol\EnrichedReflectorFactory;
use PPLCZVendor\Humbug\PhpScoper\Symbol\SymbolsRegistry;
use PPLCZVendor\PhpParser\Lexer;
use PPLCZVendor\PhpParser\Parser;
/**
 * @final
 */
class ScoperFactory
{
    private Parser $parser;
    private EnrichedReflectorFactory $enrichedReflectorFactory;
    private Printer $printer;
    private Lexer $lexer;
    public function __construct(Parser $parser, EnrichedReflectorFactory $enrichedReflectorFactory, Printer $printer, Lexer $lexer)
    {
        $this->parser = $parser;
        $this->enrichedReflectorFactory = $enrichedReflectorFactory;
        $this->printer = $printer;
        $this->lexer = $lexer;
    }
    public function createScoper(Configuration $configuration, SymbolsRegistry $symbolsRegistry) : Scoper
    {
        $prefix = $configuration->getPrefix();
        $symbolsConfiguration = $configuration->getSymbolsConfiguration();
        $enrichedReflector = $this->enrichedReflectorFactory->create($symbolsConfiguration);
        $autoloadPrefixer = new AutoloadPrefixer($prefix, $enrichedReflector);
        return new PatchScoper(new PhpScoper($this->parser, new JsonFileScoper(new InstalledPackagesScoper(new SymfonyScoper(new NullScoper(), $prefix, $enrichedReflector, $symbolsRegistry), $autoloadPrefixer), $autoloadPrefixer), new TraverserFactory($enrichedReflector, $prefix, $symbolsRegistry), $this->printer, $this->lexer), $prefix, $configuration->getPatcher());
    }
}
