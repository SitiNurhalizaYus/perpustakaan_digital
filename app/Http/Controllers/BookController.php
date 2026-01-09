<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Services\SearchService;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    // SearchHistory + Book (Models)
    public function search(Request $r, SearchService $service){
        $books = $service->search($r->q);
        return view('books',compact('books'));
    }

}





