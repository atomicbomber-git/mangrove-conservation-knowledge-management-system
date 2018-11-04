<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Article;
use App\Research;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_articles = Article::select('id', 'title', 'poster_id', 'category_id', 'published_date')
            ->with('poster:id,name', 'category:id,name')
            ->approved()
            ->orderByDesc('published_date')
            ->limit(3)
            ->get();

        $latest_researches = Research::select('id', 'title', 'poster_id', 'category_id', 'created_at')
            ->with('poster:id,name', 'category:id,name')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        $slides = Slide::select('id', 'name', 'description')->get();
        return view('home', compact('slides', 'latest_articles', 'latest_researches'));
    }
}
