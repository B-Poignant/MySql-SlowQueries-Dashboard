<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubmitImportsTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
	function guest_can_import_a_new_link() {
		$response = $this->post('/import', [
            'query' => 'Example Query',
        ]);

        $this->assertDatabaseHas('imports', [
            'query' => 'Example Query'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));

        $this
            ->get('/')
            ->assertSee('Example Query');
		
	}

    /** @test */
	function user_can_import_a_new_link() {
		$response = $this->post('/import', [
            'query' => 'Example Query',
        ]);

        $this->assertDatabaseHas('imports', [
            'query' => 'Example Query'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));

        $this
            ->get('/')
            ->assertSee('Example Query');
		
	}
}
