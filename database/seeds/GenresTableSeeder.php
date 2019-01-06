<?php

use App\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(array(
            'name'=> 'Thriller'
        ));
        Genre::create(array(
            'name'=> 'Mystery'
        ));
        Genre::create(array(
            'name'=> 'Fanatsy'
        ));
        Genre::create(array(
            'name'=> 'Romance'
        ));
        Genre::create(array(
            'name'=> 'Sci-fi'
        ));
    }
}
