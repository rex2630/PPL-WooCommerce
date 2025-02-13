<?php

declare (strict_types=1);
namespace PPLCZVendor;

use PPLCZVendor\PhpParser\NodeDumper;
use PPLCZVendor\PhpParser\ParserFactory;
require_once __DIR__ . '/vendor/autoload.php';
$code = <<<'CODE'
<?php

namespace PPLCZVendor;

function test(int|float $foo)
{
    \var_dump($foo);
}
CODE;
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$ast = $parser->parse($code);
$dumper = new NodeDumper();
echo $dumper->dump($ast) . "\n";
