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
            'password' => '1234JoJo!',
        ));
        User::create(array(
            'name'=> 'Jonathan',
            'email' => 'jonathan@jojo.jj',
            'password' => '1234JoJo!'
        ));
        User::create(array(
            'name'=> 'Jotaro',
            'email' => 'jotaro@jojo.jj',
            'password' => '1234JoJo!'
        ));
    }
}
