<?php

namespace Xefi\Faker\EnUs\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $indicator = '+1';

    protected array $areaCodes = [
        '201', '202', '206', '212', '213', '214', '303', '305', '312', '313', '404', '415', '469', '503',
        '512', '602', '617', '619', '646', '702', '713', '718', '773', '805', '818', '917',
    ];

    protected array $landlineFormats = [
        '{area}{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
    ];

    protected array $cellFormats = [
        '{area}{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
    ];

    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'en_US';
    }

    /**
     * Generate a North American phone number with a US area code, an exchange starting with 2-9 and a separator
     * between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($format === null) {
            $format = $this->pickArrayRandomElement(array_merge($this->landlineFormats, $this->cellFormats));
        }

        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        $format = str_replace(
            ['{area}', '{exchange}'],
            [$this->pickArrayRandomElement($this->areaCodes), (string) $this->randomizer->getInt(2, 9)],
            $format
        );

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
