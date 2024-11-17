<?php

namespace Xefi\Faker\EnUs\Extensions;

use Xefi\Faker\Calculators\Luhn;
use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    public function ein(): string
    {
        $prefix = $this->randomizer->getBytesFromString(implode(range(0, 9)), 2);
        $suffix = $this->randomizer->getBytesFromString(implode(range(0, 9)), 7);

        return $prefix . '-' . $suffix;
    }
}
