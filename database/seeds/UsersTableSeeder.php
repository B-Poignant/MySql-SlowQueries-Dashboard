<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\User::firstOrNew([
            'email' => 'benjipoi@hotmail.com',
            'name' => 'B.Poignant',
            'password' => bcrypt('secret')
        ]);

        factory(App\User::class, 9)->create();
    }
}
