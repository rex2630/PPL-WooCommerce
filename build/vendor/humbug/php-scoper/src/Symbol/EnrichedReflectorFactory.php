<?php

declare (strict_types=1);
namespace PPLCZVendor\Humbug\PhpScoper\Symbol;

use PPLCZVendor\Humbug\PhpScoper\Configuration\SymbolsConfiguration;
final class EnrichedReflectorFactory
{
    private Reflector $reflector;
    public function __construct(Reflector $reflector)
    {
        $this->reflector = $reflector;
    }
    public function create(SymbolsConfiguration $symbolsConfiguration) : EnrichedReflector
    {
        $configuredReflector = $this->reflector->withAdditionalSymbols($symbolsConfiguration->getExcludedClasses(), $symbolsConfiguration->getExcludedFunctions(), $symbolsConfiguration->getExcludedConstants());
        return new EnrichedReflector($configuredReflector, $symbolsConfiguration);
    }
}
