<?php

namespace PPLCZ\Model\Runtime\Client;



use PPLCZVendor\Symfony\Component\OptionsResolver\Options;
interface CustomQueryResolver
{
    public function __invoke(Options $options, $value);
}
\class_alias('PPLCZVendor\\CustomQueryResolver', 'CustomQueryResolver', \false);