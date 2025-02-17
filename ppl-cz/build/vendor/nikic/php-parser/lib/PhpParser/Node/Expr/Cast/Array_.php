<?php

declare (strict_types=1);
namespace PPLCZVendor\PhpParser\Node\Expr\Cast;

use PPLCZVendor\PhpParser\Node\Expr\Cast;
class Array_ extends Cast
{
    public function getType() : string
    {
        return 'Expr_Cast_Array';
    }
}
