<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Laravel for Beginners',
            'author' => 'John Doe',
            'genre' => 'Programming',
            'description' => 'Panduan dasar menggunakan Laravel',
            'cover' => 'default_cover.jpg'
        ]);
    }
}
