<?php

use Illuminate\Database\Seeder;

class ImportFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ImportFile::class, 15)->create();
    }
}
