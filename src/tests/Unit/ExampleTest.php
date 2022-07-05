<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_debug() 
    {
        function a() {
            $args = func_get_args();
            if ($args) {
                return true;
            } else {
                return false;
            }
        }
        $this->assertEquals(false, a());
    }
}
