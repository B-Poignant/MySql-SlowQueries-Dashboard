<?php

namespace Tests\Feature\Queries;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;


class SubmitQueriesTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	function guest_cant_access_query_form() {
		$response = $this->get('/queries/submit');

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/login'));
	}

    /** @test */
    function user_can_submit_a_new_query() {

        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->post('/queries/submit', [
            'query' => 'Example Query',
        ]);

        $this->assertDatabaseHas('queries', [
            'query' => 'Example Query'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/queries/index'));

        $this->actingAs($user)
            ->get('/queries/index')
            ->assertSee('Example Query');

    }

}
