<?php 
namespace App\Services;

use App\Models\Book;
use App\Models\SearchHistory;

class RecommendationService
{
    public function getRecommendations()
    {
        $keywords = SearchHistory::selectRaw('keyword, COUNT(*) as total')
                    ->groupBy('keyword')
                    ->orderByDesc('total')
                    ->limit(5)
                    ->pluck('keyword');

        return Book::where(function($q) use ($keywords){
            foreach($keywords as $k){
                $q->orWhere('title','like',"%$k%")
                  ->orWhere('author','like',"%$k%");
            }
        })->get();
    }
}
