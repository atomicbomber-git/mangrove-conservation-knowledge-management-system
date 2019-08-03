<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\Definisi;

class SearchController extends Controller
{
    private $searchableFields = ['title', 'description'];

    public function search()
    {
        $data = $this->validate(request(), [
            'keyword' => 'nullable|string'
        ]);

        $splitted_keywords = explode(' ', $data['keyword'] ?? '');

        $google_scholar_query = $this->getGoogleScholarSearchQuery($splitted_keywords);

        $researches = null;
        $definisis = null;

        if (request('mode') === 'researches') {
            $researches = $this->getResearchSearchResults($splitted_keywords);
        }
        else if (request('mode') === 'definisis') {
            $definisis = $this->getDefinisiSearchResults($splitted_keywords);
        }

        return view('search', compact('splitted_keywords', 'researches', "definisis", "google_scholar_query"));
    }

    private function getGoogleScholarSearchQuery($keywords)
    {
        $joined_keywords = join("+", array_merge(
            ["mangrove"], $keywords
        ));

        return "https://scholar.google.co.id/scholar?hl=en&as_sdt=0%2C5&q={$joined_keywords}";
    }

    private function getResearchSearchResults($keywords)
    {
        return Research::query()
            ->select('id', 'title', 'year', 'description', 'poster_id', 'category_id', 'status')
            ->with('authors:id,first_name,last_name,research_id')
            ->where(function ($query) use($keywords) {
                foreach ($keywords as $keyword) {
                    foreach ($this->searchableFields as $field) {
                        $query->orWhere($field, 'LIKE', "%$keyword%");
                    }
                }
            })
            ->orderByDesc('year')
            ->paginate(5);
    }

    private function getDefinisiSearchResults($keywords) {
        return Definisi::query()
            ->select('id', 'title', 'content')
            ->where(function ($query) use($keywords) {
                foreach ($keywords as $keyword) {
                    foreach (['title', 'content'] as $field) {
                        $query->orWhere($field, 'LIKE', "%$keyword%");
                    }
                }
            })
            ->orderByDesc('title')
            ->paginate(5);
    }
}
