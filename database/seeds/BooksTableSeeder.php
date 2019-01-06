<?php

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create(array(
            'author_id' => 1,
            'genre_id' => 1,
            'title' => '1984',
            'publish_date' => '1986-02-03'
        ));
        Book::create(array(
            'author_id' => 2,
            'genre_id' => 2,
            'title' => 'The Man With The Brown Suit',
            'publish_date' => '1953-10-10'
        ));
        Book::create(array(
            'author_id' => 3,
            'genre_id' => 3,
            'title' => 'The Hobbit',
            'publish_date' => '1966-07-06'
        ));
        Book::create(array(
            'author_id' => 2,
            'genre_id' => 3,
            'title' => 'Harry Potter',
            'publish_date' => '1999-06-06'
        ));
    }
}
