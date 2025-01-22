<?php

declare (strict_types=1);
namespace PPLCZVendor\Humbug\PhpScoper\PhpParser\NodeVisitor;

use PPLCZVendor\PhpParser\Node\Name;
// TODO: review those classes
final class OriginalNameResolver
{
    private const ORIGINAL_NAME_ATTRIBUTE = 'originalName';
    public static function hasOriginalName(Name $namespace) : bool
    {
        return $namespace->hasAttribute(self::ORIGINAL_NAME_ATTRIBUTE);
    }
    public static function getOriginalName(Name $name) : Name
    {
        if (!self::hasOriginalName($name)) {
            return $name;
        }
        return $name->getAttribute(self::ORIGINAL_NAME_ATTRIBUTE);
    }
    private function __construct()
    {
    }
}
