<?php

namespace Database\Seeders;

use App\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::factory()->count(20)->create();
    }
}
