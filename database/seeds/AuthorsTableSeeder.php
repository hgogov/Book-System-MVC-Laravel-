<?php

use App\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(array(
            'name'=> 'Steven King'
        ));
        Author::create(array(
            'name'=> 'Agatha Christie'
        ));
        Author::create(array(
            'name'=> 'Ernest Hemingway'
        ));
    }
}
