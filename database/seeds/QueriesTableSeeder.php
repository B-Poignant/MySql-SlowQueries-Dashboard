<?php

use Illuminate\Database\Seeder;

class QueriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Query::class, 5)->create();
    }
}
