<?php

namespace Tests\Feature\Imports;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use App\User;

class SubmitImportsTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
	function guest_cant_access_import_form() {
        $response = $this->get('/imports/submit');

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/login'));
		
	}

    /** @test */
	function user_can_submit_a_new_import() {
        $user = factory(User::class)->make();

        $sample_file = new UploadedFile(
            __DIR__ . '/sample_sql.log',
            'sample_sql.log',
            'text/plain',
            null,
            null,
            true
        );

        $response = $this->actingAs($user)->call('POST','/imports/submit', [],[],['log'=> $sample_file]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/imports/index'));

        /*$this->actingAs($user)
            ->get('/imports/index')
            ->assertSee('Example Query');*/

	}
}
