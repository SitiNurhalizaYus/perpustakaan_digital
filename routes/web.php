<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

Route::get('/', function(){
    return view('home');
});

Route::get('/books', [BookController::class,'index']);
Route::get('/search', [BookController::class,'search']);
Route::get('/borrow/{id}', [LoanController::class,'borrow']);
Route::get('/return/{id}', [LoanController::class,'returnBook']);
Route::get('/loans', [LoanController::class,'myLoans']);

