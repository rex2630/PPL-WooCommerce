<?php

declare (strict_types=1);
namespace PPLCZVendor\PhpParser\Node\Stmt;

use PPLCZVendor\PhpParser\Node;
abstract class TraitUseAdaptation extends Node\Stmt
{
    /** @var Node\Name|null Trait name */
    public $trait;
    /** @var Node\Identifier Method name */
    public $method;
}
