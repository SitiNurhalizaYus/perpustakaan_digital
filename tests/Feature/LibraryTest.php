<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use App\Models\User;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class LibraryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed users (mock academic)
        User::insert([
            ['nim'=>'2511089003','name'=>'Siti','faculty'=>'Informatika'],
            ['nim'=>'2109101013','name'=>'Liza','faculty'=>'Sistem Informasi'],
            ['nim'=>'123456789','name'=>'Cila','faculty'=>'Teknik Komputer'],
            ['nim'=>'987456321','name'=>'Adam','faculty'=>'Teknik Komputer'],
        ]);
    }

    public function test_search_book_still_works_after_evolution()
    {
        Book::create([
            'title' => 'Algoritma Test',
            'author' => 'Tester',
            'year' => 2024,
            'stock' => 5
        ]);

        $response = $this->get('/search?q=Algoritma');

        $response->assertStatus(200);
        $response->assertSee('Algoritma Test');
    }

    public function test_borrow_book_reduces_stock()
    {
        $user = User::first();

        $book = Book::create([
            'title' => 'Laravel Testing',
            'author' => 'QA',
            'year' => 2024,
            'stock' => 3
        ]);

        $this->post("/borrow/{$book->id}", [
            'nim' => $user->nim
        ])->assertStatus(200);

        $this->assertEquals(2, $book->fresh()->stock);

        $this->assertDatabaseHas('loans', [
            'book_id' => $book->id,
            'user_id' => $user->id,
            'status' => 'borrowed'
        ]);
    }

    public function test_return_book_increases_stock()
    {
        $user = User::first();

        $book = Book::create([
            'title' => 'Database Testing',
            'author' => 'QA',
            'year' => 2024,
            'stock' => 5
        ]);

        $loan = Loan::create([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'loan_date' => now(),
            'status' => 'borrowed'
        ]);

        $book->decrement('stock'); // jadi 4

        $this->get("/return/{$loan->id}");

        $this->assertEquals(5, $book->fresh()->stock);
    }

    public function test_academic_users_exist()
    {
        $this->assertDatabaseHas('users', ['nim' => '2511089003']);
        $this->assertDatabaseHas('users', ['nim' => '2109101013']);
    }

    public function test_recommendation_works_based_on_search_history()
    {
        DB::table('search_histories')->insert([
            ['keyword' => 'Laravel'],
            ['keyword' => 'Laravel'],
            ['keyword' => 'Laravel'],
        ]);

        Book::create([
            'title' => 'Laravel Expert',
            'author' => 'Liza',
            'year' => 2024,
            'stock' => 5
        ]);

        $response = $this->get('/recommendations');

        $response->assertStatus(200);
        $response->assertSee('Laravel');
    }
}
