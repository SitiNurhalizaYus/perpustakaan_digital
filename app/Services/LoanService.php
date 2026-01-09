<?php 
namespace App\Services;

use App\Models\Book;
use App\Models\Loan;

class LoanService
{
    public function borrow($bookId)
    {
        $book = Book::findOrFail($bookId);

        if($book->stock < 1) return false;

        Loan::create([
            'book_id'=>$bookId,
            'loan_date'=>now(),
            'status'=>'borrowed'
        ]);

        $book->decrement('stock');
        return true;
    }

    public function returnBook($loan)
    {
        $loan->update(['status'=>'returned']);
        $loan->book->increment('stock');
    }
}
