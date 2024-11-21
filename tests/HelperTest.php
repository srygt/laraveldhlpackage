<?php

namespace serdaryigit\Laravel\Tests;

use serdaryigit\Laravel\DhlClientAdapter;

class HelperTest extends TestCase
{
    /** @test */
    public function it_has_a_helper_function()
    {
        $this->assertTrue(function_exists('dhl'));

        $this->assertInstanceOf(DhlClientAdapter::class, dhl());
    }
}