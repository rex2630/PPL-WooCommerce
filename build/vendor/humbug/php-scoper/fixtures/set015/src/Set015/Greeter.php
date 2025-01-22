<?php

declare (strict_types=1);
namespace PPLCZVendor\Set015;

use PPLCZVendor\Pimple\Container;
class Greeter
{
    public function greet(Container $c) : string
    {
        return $c['hello'];
    }
}
