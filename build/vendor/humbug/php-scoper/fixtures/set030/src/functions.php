<?php

declare (strict_types=1);
namespace PPLCZVendor;

function foo() : bool
{
    return \true;
}
if (!\function_exists('bar')) {
    function bar() : bool
    {
        return \true;
    }
}
if (\function_exists('baz')) {
    baz();
}
