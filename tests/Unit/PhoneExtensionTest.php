<?php

namespace Xefi\Faker\EnUs\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[2-9]\d{2}[2-9]\d{6}$/', $this->faker->phoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[2-9]\d{2}-[2-9]\d{2}-\d{4}$/', $this->faker->dashedLandlinePhoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[2-9]\d{2} [2-9]\d{2} \d{4}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+1[2-9]\d{2}[2-9]\d{6}$/', $this->faker->indicatoredPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+1 [2-9]\d{2} [2-9]\d{2} \d{4}$/', $this->faker->spacedIndicatoredPhoneNumber());
        }
    }

    public function testIndicatorIsSeparatedFromTheNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertStringStartsWith('+1 ', $this->faker->spacedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+1-', $this->faker->dashedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+1.', $this->faker->dottedIndicatoredPhoneNumber());
        }
    }
}
