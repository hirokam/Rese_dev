<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRese()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);
    //     $this->assertTrue(true);

    //     $arr = [];
    //     $this->assertEmpty($arr);

    //     $txt = "Hello Rese";
    //     $this->assertEquals('Hello Rese', $txt);

    //     $n = random_int(0,100);
    //     $this->assertLessThan(100, $n);
    }
}
