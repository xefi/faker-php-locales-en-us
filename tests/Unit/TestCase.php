<?php

namespace Xefi\Faker\EnUs\Tests\Unit;

use Xefi\Faker\Container\Container;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        (new \Xefi\Faker\EnUs\FakerEnUsServiceProvider())->boot();

        $this->faker = (new Container(false))->locale('en_US');
    }
}
