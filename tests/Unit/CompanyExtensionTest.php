<?php

namespace Xefi\Faker\EnUs\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\Container\Container;
use Xefi\Faker\EnUs\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testEin()
    {
        $faker = new Container(false);

        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $faker->ein();
        }

        foreach ($results as $result) {
            $this->assertMatchesRegularExpression('/^\d{2}-\d{7}$/', $result);

            [$prefix, $suffix] = explode('-', $result);
            $this->assertEquals(2, strlen($prefix));
            $this->assertEquals(7, strlen($suffix));
        }
    }

    public function testCompany()
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }
}
