<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['book_id','borrower','loan_date','return_date','status'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

