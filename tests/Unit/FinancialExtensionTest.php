<?php

namespace Xefi\Faker\EnUs\Tests\Unit;

use Xefi\Faker\Calculators\Iban;

final class FinancialExtensionTest extends TestCase
{
    public function testIban()
    {
        $iban = $this->faker->iban();

        $this->assertEquals(27, strlen($iban));
        $this->assertStringStartsWith('US', $iban);
        $this->assertTrue(Iban::isValid($iban));
    }
}
