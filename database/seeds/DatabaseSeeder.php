<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(UserRoleProjectTableSeeder::class);
        $this->call(QueriesTableSeeder::class);
        $this->call(ImportsTableSeeder::class);
        $this->call(ImportFilesTableSeeder::class);
        $this->call(ImportDetailsTableSeeder::class);
    }
}
