<?php

namespace Xefi\Faker\EnUs\Extensions;

use Xefi\Faker\Calculators\Luhn;
use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    private array $companies = [
        "Oakridge Enterprises", "SummitPeak Group", "LibertyWorks Industries",
        "Pioneer Dynamics", "Northstar Solutions", "Heritage Valley Financial",
        "BigSky Logistics", "IronTrail Manufacturing", "SilverCrest Energy",
        "Evergreen Partners", "Redwood Analytics", "Highland Tech Labs",
        "BlueRiver Medical", "Patriot Systems Inc.", "Stonebridge Holdings",
        "FreedomForge Corp.", "American Horizon Ventures", "EaglePoint Investments",
        "Trailblazer Innovations", "Grandview Networks", "Maplewood Industries",
        "CedarHill Technologies", "LoneStar Utilities", "CapitalEdge Group",
        "Canyon Ridge Development", "Dakota Plains Energy", "Appalachia Steelworks",
        "Hudson Bay Logistics", "GreatLakes Solutions", "Phoenix Harbor Corporation"
    ];

    public function ein(): string
    {
        $prefix = $this->randomizer->getBytesFromString(implode(range(0, 9)), 2);
        $suffix = $this->randomizer->getBytesFromString(implode(range(0, 9)), 7);

        return $prefix . '-' . $suffix;
    }

    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }
}
