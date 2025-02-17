<?php

declare (strict_types=1);
namespace PPLCZVendor\PhpParser\Node\Stmt;

use PPLCZVendor\PhpParser\Node;
/** Nop/empty statement (;). */
class Nop extends Node\Stmt
{
    public function getSubNodeNames() : array
    {
        return [];
    }
    public function getType() : string
    {
        return 'Stmt_Nop';
    }
}
