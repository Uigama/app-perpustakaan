<?php

namespace Tests\Feature;

use App\Book;
use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCategoryRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_page_shows_category_name_instead_of_raw_id(): void
    {
        $user = User::create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'password' => bcrypt('password'),
            'role' => 'petugas',
        ]);

        $category = Category::create([
            'nama_kategori' => 'Fiksi',
            'deskripsi' => 'Novel dan cerita fiksi',
        ]);

        Book::create([
            'judul' => 'Dilan 1990',
            'penulis' => 'Pidi Baiq',
            'penerbit' => 'Pastel Books',
            'tahun_terbit' => 2014,
            'isbn' => '978602',
            'stok' => 10,
            'category_id' => $category->id,
        ]);

        $response = $this->actingAs($user)->get('/books');

        $response->assertStatus(200)
            ->assertSeeText('Fiksi');
    }
}
