<?php

namespace Tests\Feature;

use App\Book;
use App\Category;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BookCategoryRelationshipTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
            ],
        ]);

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('tahun_terbit');
            $table->string('isbn')->nullable();
            $table->integer('stok');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
    }

    public function test_books_page_shows_category_name_instead_of_raw_id(): void
    {
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

        $response = $this->get('/books');

        $response->assertStatus(200)
            ->assertSeeText('Fiksi');
    }
}
