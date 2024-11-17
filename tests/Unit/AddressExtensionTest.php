<?php

namespace Xefi\Faker\EnUs\Tests\Unit;

use ReflectionClass;

final class AddressExtensionTest extends TestCase
{
    protected array $states = [];
    protected array $regions = [];

    protected function setUp(): void
    {
        parent::setUp();

        $addressExtension = new \Xefi\Faker\EnUs\Extensions\AddressExtension(new \Random\Randomizer());
        $this->regions = (new ReflectionClass($addressExtension))->getProperty('regions')->getValue($addressExtension);
        $this->states = (new ReflectionClass($addressExtension))->getProperty('states')->getValue($addressExtension);
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
}
