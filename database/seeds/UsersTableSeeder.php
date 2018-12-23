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
        DB::table('users')->insert([
            'name' => 'B.Poignant',
            'email' => 'benjipoi@hotmail.com',
            'password' => bcrypt('secret'),
        ]);

        factory(App\User::class, 9)->create();
    }
}
