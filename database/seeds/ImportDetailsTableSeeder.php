<?php

use Illuminate\Database\Seeder;

class ImportDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ImportDetail::class, 15)->create();
    }
}
