<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use App\Services\AcademicService;

class LoanController extends Controller
{
    protected $academic;

    public function __construct(AcademicService $academic)
    {
        $this->academic = $academic;
    }

    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);

        $loan->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        $loan->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan');
    }

    public function myLoans()
    {
        $loans = Loan::with(['book','user'])
                     ->where('status','borrowed')
                     ->get();

        return view('my_loans', compact('loans'));
    }

    public function borrow(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required'
        ]);

        $user = User::where('nim', $request->nim)->first();

        if (!$user) {
            return back()->with('error','NIM tidak terdaftar di sistem akademik');
        }

        $book = Book::findOrFail($id);

        if ($book->stock <= 0) {
            return back()->with('error','Stok habis');
        }

        Loan::create([
            'book_id' => $id,
            'user_id' => $user->id,
            'loan_date' => now(),
            'status' => 'borrowed'
        ]);

        $book->decrement('stock');

        return back()->with('success','Buku dipinjam oleh '.$user->name);
    }


}
