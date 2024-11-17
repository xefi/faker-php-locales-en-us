<?php

namespace Xefi\Faker\EnUs\Tests\Unit;

use Xefi\Faker\Calculators\Luhn;
use Xefi\Faker\Container\Container;

final class CompanyExtensionTest extends TestCase
{
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
}
