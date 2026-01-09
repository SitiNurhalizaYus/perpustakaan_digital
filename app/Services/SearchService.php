<?php 

namespace App\Services;

use App\Models\Book;
use App\Models\SearchHistory;

class SearchService
{
    public function search($keyword)
    {
        SearchHistory::create(['keyword'=>$keyword]);

        return Book::where('title','like',"%$keyword%")
                   ->orWhere('author','like',"%$keyword%")
                   ->get();
    }
}
