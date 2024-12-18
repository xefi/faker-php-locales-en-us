<?php

namespace Xefi\Faker\EnUs\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\EnUs\Exceptions\BadFormatException;
use Xefi\Faker\EnUs\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected array $states = [];
    protected array $regions = [];
    protected array $streetNames = [];
    protected array $streetSuffixes = [];
    protected array $cities = [];

    protected function setUp(): void
    {
        parent::setUp();

        $addressExtension = new AddressExtension(new Randomizer());
        $this->cities = (new ReflectionClass($addressExtension))->getProperty('cities')->getValue($addressExtension);
        $this->regions = (new ReflectionClass($addressExtension))->getProperty('regions')->getValue($addressExtension);
        $this->states = (new ReflectionClass($addressExtension))->getProperty('states')->getValue($addressExtension);
        $this->streetNames = (new ReflectionClass($addressExtension))->getProperty('streetNames')->getValue($addressExtension);
        $this->streetSuffixes = (new ReflectionClass($addressExtension))->getProperty('streetSuffixes')->getValue($addressExtension);
    }

    public function testRegion(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->regions); $i++) {
            $results[] = $this->faker->unique()->region();
        }

        $this->assertEqualsCanonicalizing(
            $this->regions,
            $results
        );
    }

    public function testState(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->states); $i++) {
            $results[] = $this->faker->unique()->state();
        }

        $this->assertEquals(
            sort($this->states),
            sort($results)
        );
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $houseNumber = $this->faker->unique()->houseNumber();
            $this->assertGreaterThanOrEqual(1, $houseNumber);
            $this->assertLessThanOrEqual(200, $houseNumber);
        }
    }

    public function testStreetName(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->unique()->streetName();
        }

        foreach ($results as $result) {
            [$streetName, $streetSuffix] = explode(' ', $result);
            $this->assertContains($streetName, $this->streetNames);
            $this->assertContains($streetSuffix, $this->streetSuffixes);
        }
    }

    public function testStreetAddress(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->unique()->streetAddress();
        }

        foreach ($results as $result) {
            [$houseNumber, $streetName, $streetSuffix] = explode(' ', $result);

            $this->assertGreaterThanOrEqual(1, $houseNumber);
            $this->assertLessThanOrEqual(200, $houseNumber);
            $this->assertContains($streetName, $this->streetNames);
            $this->assertContains($streetSuffix, $this->streetSuffixes);
        }
    }

    public function testZipCodeWithDefaultParameters(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $zipCode = $this->faker->unique()->zipCode();

            $this->assertMatchesRegularExpression('/^\d{5}$/', $zipCode);
        }
    }

    public function testZipCodeWith9Digits(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $zipCode = $this->faker->unique()->zipCode(format: '9-digits');

            $this->assertMatchesRegularExpression('/^\d{5}-\d{4}$/', $zipCode);
        }
    }

    public function testZipCodeWith5Digits(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $zipCode = $this->faker->unique()->zipCode(format: '5-digits');

            $this->assertMatchesRegularExpression('/^\d{5}$/', $zipCode);
        }
    }

    public function testZipCodeWithBadParameters(): void
    {
        $this->expectException(BadFormatException::class);
        $this->faker->unique()->zipCode(format: 'bad-digits');
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cities); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing(
            $this->cities,
            $results
        );
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $address = $this->faker->unique()->fullAddress();

            $this->assertMatchesRegularExpression('/^\d{1,3} [\w ]+, [\w ]+, [\w ]+ \d{5}$/', $address);
        }
    }
}
