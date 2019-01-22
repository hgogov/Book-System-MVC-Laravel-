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
            'publish_date' => '1986-02-03',
            'cover_image' => 'public/cover_images/1.jpg',
            'description' => 'Among the seminal texts of the 20th century, Nineteen Eighty-Four is a rare work that grows more haunting as its futuristic purgatory becomes more real. Published in 1949, the book offers political satirist George Orwell\'s nightmarish vision of a totalitarian, bureaucratic world and one poor stiff\'s attempt to find individuality. '

        ));
        Book::create(array(
            'author_id' => 2,
            'genre_id' => 2,
            'title' => 'The Man With The Brown Suit',
            'publish_date' => '1953-10-10',
            'cover_image' => 'public/cover_images/2.jpg',
            'description' => 'Newly-orphaned Anne Beddingfield came to London expecting excitement. She didn\'t expect to find it on the platform of Hyde Park Corner tube station. When a fellow passenger pitches onto the rails and is electrocuted, the \'doctor\' on the scene seems intent on searching the victim rather than examining him . . .  '
        ));
        Book::create(array(
            'author_id' => 3,
            'genre_id' => 3,
            'title' => 'The Hobbit',
            'publish_date' => '1966-07-06',
            'cover_image' => 'public/cover_images/3.jpg',
            'description' => 'In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to eat: it was a hobbit-hole, and that means comfort. '
        ));
        Book::create(array(
            'author_id' => 2,
            'genre_id' => 3,
            'title' => 'Harry Potter',
            'publish_date' => '1999-06-06',
            'cover_image' => 'public/cover_images/4.jpg',
            'description' => 'Harry Potter\'s life is miserable. His parents are dead and he\'s stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself: he\'s a wizard. A mysterious visitor rescues him from his relatives and takes him to his new home, Hogwarts School of Witchcraft and Wizardry. '
        ));
    }
}
