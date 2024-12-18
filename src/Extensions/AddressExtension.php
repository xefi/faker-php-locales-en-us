<?php

namespace Xefi\Faker\EnUs\Extensions;

use Xefi\Faker\EnUs\Exceptions\BadFormatException;
use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    protected $states = [
        ['AL' => 'Alabama'], ['AK' => 'Alaska'], ['AZ' => 'Arizona'], ['AR' => 'Arkansas'], ['CA' => 'California'],
        ['CO' => 'Colorado'], ['CT' => 'Connecticut'], ['DE' => 'Delaware'], ['FL' => 'Florida'], ['GA' => 'Georgia'],
        ['HI' => 'Hawaii'], ['ID' => 'Idaho'], ['IL' => 'Illinois'], ['IN' => 'Indiana'], ['IA' => 'Iowa'],
        ['KS' => 'Kansas'], ['KY' => 'Kentucky'], ['LA' => 'Louisiana'], ['ME' => 'Maine'], ['MD' => 'Maryland'],
        ['MA' => 'Massachusetts'], ['MI' => 'Michigan'], ['MN' => 'Minnesota'], ['MS' => 'Mississippi'], ['MO' => 'Missouri'],
        ['MT' => 'Montana'], ['NE' => 'Nebraska'], ['NV' => 'Nevada'], ['NH' => 'New Hampshire'], ['NJ' => 'New Jersey'],
        ['NM' => 'New Mexico'], ['NY' => 'New York'], ['NC' => 'North Carolina'], ['ND' => 'North Dakota'], ['OH' => 'Ohio'],
        ['OK' => 'Oklahoma'], ['OR' => 'Oregon'], ['PA' => 'Pennsylvania'], ['RI' => 'Rhode Island'], ['SC' => 'South Carolina'],
        ['SD' => 'South Dakota'], ['TN' => 'Tennessee'], ['TX' => 'Texas'], ['UT' => 'Utah'], ['VT' => 'Vermont'],
        ['VA' => 'Virginia'], ['WA' => 'Washington'], ['WV' => 'West Virginia'], ['WI' => 'Wisconsin'], ['WY' => 'Wyoming'],
    ];

    protected $regions = [
        'Northeast', 'Midwest', 'South', 'West',
    ];

    protected $streetSuffixes = [
        'Street', 'Avenue', 'Boulevard', 'Drive', 'Lane', 'Road', 'Court', 'Way', 'Place', 'Terrace', 'Circle',
        'Trail', 'Parkway', 'Square', 'Loop', 'Commons', 'Path', 'Alley', 'Row', 'Crescent', 'Close',
        'Garden', 'Walk', 'Mews', 'Quay', 'Point', 'Pike', 'Terrace', 'Highway', 'Driveway', 'Creek',
        'Dock', 'Court', 'Causeway', 'Villas', 'Gateway', 'Ramp'
    ];

    protected $streetNames = [
        'Main', 'Oak', 'Pine', 'Maple', 'Elm', 'Cedar', 'Birch', 'Spruce', 'Ash', 'Willow',
        'Highland', 'Hill', 'River', 'Lake', 'Sunset', 'Lakeshore', 'Canyon', 'Westwood', 'Park', 'Meadow',
        'Mountain', 'Forest', 'Valley', 'Brook', 'Woodland', 'Chestnut', 'Rose', 'King', 'Queen', 'Lincoln',
        'Washington', 'Jefferson', 'Franklin', 'Adams', 'Clayton', 'Wellington', 'Harrison', 'Madison', 'Jefferson', 'Riverside',
        'Sunrise', 'Golden', 'Silver', 'Sunnyside', 'Diamond'
    ];

    protected $cities = [
        'New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose',
        'Austin', 'Jacksonville', 'Fort Worth', 'Columbus', 'Charlotte', 'San Francisco', 'Indianapolis', 'Seattle', 'Denver', 'Washington',
        'Boston', 'El Paso', 'Nashville', 'Detroit', 'Oklahoma City', 'Portland', 'Las Vegas', 'Memphis', 'Louisville', 'Baltimore',
        'Milwaukee', 'Albuquerque', 'Tucson', 'Fresno', 'Sacramento', 'Kansas City', 'Long Beach', 'Mesa', 'Atlanta', 'Colorado Springs',
        'Virginia Beach', 'Raleigh', 'Omaha', 'Miami'
    ];

    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    public function state(): array
    {
        return $this->pickArrayRandomElement($this->states);
    }

    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 200);
    }

    public function streetName(): string
    {
        $streetName = $this->pickArrayRandomElement($this->streetNames);
        $streetSuffix = $this->pickArrayRandomElement($this->streetSuffixes);
        return sprintf('%s %s', $streetName, $streetSuffix);
    }

    public function streetAddress(): string
    {
        return sprintf('%d %s', $this->houseNumber(), $this->streetName());
    }

    public function zipCode(string $format = '5-digits'): string
    {
        return match ($format) {
            '5-digits' => sprintf('%05d', $this->randomizer->getInt(1, 99999)),
            '9-digits' => sprintf('%05d-%04d', $this->randomizer->getInt(1, 99999), $this->randomizer->getInt(1, 9999)),
            default    => throw new BadFormatException('Available formats are "5-digits" and "9-digits".'),
        };
    }

    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    public function fullAddress(): string
    {
        $street = $this->streetAddress();
        $city = $this->city();
        $state = $this->state();
        $zipCode = $this->zipCode();

        return sprintf('%s, %s, %s %s', $street, $city, reset($state), $zipCode);
    }
}
