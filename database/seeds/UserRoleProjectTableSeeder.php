<?php

use Illuminate\Database\Seeder;

class UserRoleProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserRoleProject::class, 15)->create();
    }
}
