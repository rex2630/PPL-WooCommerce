<?php

declare (strict_types=1);
namespace PPLCZVendor\PhpParser\Node\Expr\AssignOp;

use PPLCZVendor\PhpParser\Node\Expr\AssignOp;
class BitwiseAnd extends AssignOp
{
    public function getType() : string
    {
        return 'Expr_AssignOp_BitwiseAnd';
    }
}
