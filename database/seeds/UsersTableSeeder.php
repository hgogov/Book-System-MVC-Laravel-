<?php

use App\User;
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
        User::create(array(
            'name'=> 'JoJo',
            'email' => 'jojo@jojo.jj',
            'password' => bcrypt('1234JoJo!'),
            'role_id' => 1
        ));
        User::create(array(
            'name'=> 'Jonathan',
            'email' => 'jonathan@jojo.jj',
            'password' => bcrypt('1234JoJo!'),
            'role_id' => 1
        ));
        User::create(array(
            'name'=> 'Jotaro',
            'email' => 'jotaro@jojo.jj',
            'password' => bcrypt('1234JoJo!'),
            'role_id' => 1
        ));
    }
}
