<?php

namespace Xefi\Faker\EnUs;

use Xefi\Faker\EnUs\Extensions\AddressExtension;
use Xefi\Faker\EnUs\Extensions\ColorsExtension;
use Xefi\Faker\EnUs\Extensions\CompanyExtension;
use Xefi\Faker\EnUs\Extensions\FinancialExtension;
use Xefi\Faker\EnUs\Extensions\PersonExtension;
use Xefi\Faker\EnUs\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerEnUsServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            ColorsExtension::class,
            TextExtension::class,
        ]);
    }
}
