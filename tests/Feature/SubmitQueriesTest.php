<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmitQueriesTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	function guest_can_submit_a_new_link() {
		$response = $this->post('/submit', [
            'query' => 'Example Query',
        ]);

        $this->assertDatabaseHas('queries', [
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
	function link_is_not_created_if_validation_fails() {
		   $response = $this->post('/submit');

		$response->assertSessionHasErrors(['query']);
	}
}
