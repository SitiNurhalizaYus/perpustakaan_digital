<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Services\RecommendationService;
use App\Http\Controllers\AcademicController;

Route::get('/', function(){
    return view('home');
});

Route::get('/books', [BookController::class,'index']);
Route::get('/search', [BookController::class,'search']);
Route::post('/borrow/{id}', [LoanController::class,'borrow']);
Route::get('/return/{id}', [LoanController::class,'returnBook']);
Route::get('/loans', [LoanController::class,'myLoans']);


Route::get('/recommendations', function(RecommendationService $r){
 return view('recommendations',['books'=>$r->getRecommendations()]);
});


Route::get('/dashboard', function(){
 return view('dashboard',[
  'totalBooks'=>\App\Models\Book::count(),
  'borrowed'=>\App\Models\Loan::where('status','borrowed')->count(),
  'transactions'=>\App\Models\Loan::count()
 ]);
});


Route::get('/sync-academic', [AcademicController::class, 'sync']);



