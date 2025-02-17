<?php

declare (strict_types=1);
namespace PPLCZVendor\PhpParser\Node\Expr\BinaryOp;

use PPLCZVendor\PhpParser\Node\Expr\BinaryOp;
class Mul extends BinaryOp
{
    public function getOperatorSigil() : string
    {
        return '*';
    }
    public function getType() : string
    {
        return 'Expr_BinaryOp_Mul';
    }
}
