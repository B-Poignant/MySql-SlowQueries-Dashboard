<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function homeIs200Test()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
