<?php

namespace PPLCZVendor\JetBrains\PhpStorm\Internal;

use Attribute;
use PPLCZVendor\JetBrains\PhpStorm\Deprecated;
use PPLCZVendor\JetBrains\PhpStorm\ExpectedValues;
/**
 * For PhpStorm internal use only
 * @since 8.0
 * @internal
 */
#[Attribute(Attribute::TARGET_FUNCTION|Attribute::TARGET_METHOD|Attribute::TARGET_PARAMETER)]
class PhpStormStubsElementAvailable
{
    public function __construct()
    {
    }
}
