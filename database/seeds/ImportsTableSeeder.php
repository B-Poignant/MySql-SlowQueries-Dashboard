<?php

use Illuminate\Database\Seeder;

class ImportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Import::class, 5)->create();
    }
}
