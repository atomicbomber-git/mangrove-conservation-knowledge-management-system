<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;

class SearchController extends Controller
{
    private $searchableFields = ['title', 'description'];

    public function search()
    {
        $data = $this->validate(request(), [
            'keyword' => 'nullable|string'
        ]);

        $splitted_keywords = explode(' ', $data['keyword'] ?? '');
        
        $query = Research::query()
            ->select('id', 'title', 'year', 'description', 'poster_id', 'category_id', 'status')
            ->with('authors:id,first_name,last_name,research_id')
            ->where(function ($query) use($splitted_keywords) {
                foreach ($splitted_keywords as $keyword) {
                    foreach ($this->searchableFields as $field) {
                        $query->orWhere($field, 'LIKE', "%$keyword%");
                    }
                }
            });

        $researches_count = $query->count();

        $joined_keywords = join("+", $splitted_keywords);
        $google_scholar_query = "https://scholar.google.co.id/scholar?hl=en&as_sdt=0%2C5&q={$joined_keywords}&btnG=";

        $researches = $query
            ->orderByDesc('year')
            ->paginate(5);

        return view('search', compact('splitted_keywords', 'researches', 'researches_count', "google_scholar_query"));
    }
}
