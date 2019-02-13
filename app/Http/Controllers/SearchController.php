<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;

class SearchController extends Controller
{
    private $searchableFields = ['title', 'description'];

    public function search()
    {
        return view('search');
    }

    public function process()
    {
        $data = $this->validate(request(), [
            'keyword' => 'nullable|string'
        ]);

        
        if (request('keyword')) {
            $splitted_keywords = explode(' ', $data['keyword'] ?? '');

            $researches = Research::query()
                ->select('id', 'title', 'year', 'description', 'poster_id', 'category_id', 'status')
                ->with('authors:id,first_name,last_name,research_id')
                ->where(function ($query) use($splitted_keywords) {
                    foreach ($splitted_keywords as $keyword) {
                        foreach ($this->searchableFields as $field) {
                            $query->orWhere($field, 'LIKE', "%$keyword%");
                        }
                    }
                })
                ->orderByDesc('year')
                ->simplePaginate(5);
        }
        
        return view('search', compact('splitted_keywords', 'researches'));
    }
}
