<?php

use Illuminate\Database\Seeder;
use Sijot\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Tim Joosten',
            'email'    => 'Topairy@gmail.com',
            'password' => bcrypt('root1995!')
        ]);
    }
}
