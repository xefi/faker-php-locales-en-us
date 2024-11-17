<?php

namespace Xefi\Faker\EnUs\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    public function getLocale(): string|null
    {
        return 'en_US';
    }

    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'US';
        }

        if ($format === null) {
            $format = sprintf(
                '%s%s%s',
                str_repeat('{d}', 2),
                str_repeat('{d}', 9),
                str_repeat('{d}', 12)
            );
        }

        return parent::iban($countryCode, $format);
    }
}
