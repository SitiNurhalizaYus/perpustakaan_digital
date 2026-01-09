<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    public function search(Request $request)
    {
        $books = Book::where('title','like','%'.$request->q.'%')
                    ->orWhere('author','like','%'.$request->q.'%')
                    ->get();
        return view('books', compact('books'));
    }
}





