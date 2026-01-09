<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;

class LoanController extends Controller
{
    public function borrow($id)
    {
        $book = Book::find($id);

        if($book->stock <= 0){
            return back()->with('error','Stok habis');
        }

        Loan::create([
            'book_id'=>$id,
            'borrower'=>'Mahasiswa',
            'loan_date'=>now(),
            'status'=>'borrowed'
        ]);

        $book->decrement('stock');

        return back()->with('success','Buku berhasil dipinjam');
    }

    public function returnBook($id)
    {
        $loan = Loan::find($id);
        $loan->update([
            'status'=>'returned',
            'return_date'=>now()
        ]);

        $loan->book->increment('stock');

        return back()->with('success','Buku dikembalikan');
    }

    public function myLoans()
    {
        $loans = Loan::where('status','borrowed')->get();
        return view('my_loans', compact('loans'));
    }


}
