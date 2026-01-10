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
        return response('NIM not found', 422);
    }

    $book = Book::findOrFail($id);

    if ($book->stock <= 0) {
        return response('Out of stock', 422);
    }

    Loan::create([
        'book_id' => $book->id,
        'user_id' => $user->id,
        'loan_date' => now(),
        'status' => 'borrowed'
    ]);

    // INI HARUS ADA
    $book->stock = $book->stock - 1;
    $book->save();

    return response('OK', 200);
}





}
