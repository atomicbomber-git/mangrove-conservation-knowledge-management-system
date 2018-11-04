<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Article;
use App\Category;

class UserArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'title', 'category_id', 'poster_id', 'published_date')
            ->approved()
            ->with('poster:id,name', 'category:id,name')
            ->orderByDesc('published_date')
            ->get();

        return view('user-article.index', compact('articles'));
    }

    public function ownIndex()
    {
        $articles = Article::select('id', 'title', 'category_id', 'poster_id', 'published_date', 'status')
            ->with('poster:id,name', 'category:id,name')
            ->where('poster_id', auth()->user()->id)
            ->orderByDesc('status', 'published_date')
            ->get();

        return view('user-article.own-index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('user-article.create', compact('categories'));
    }

    public function store() {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => 'required|string|unique:articles',
            'content' => 'required|string',
            'category_id' => ['required', Rule::in($category_ids)]
        ]);

        $data['poster_id'] = auth()->user()->id;
        $data['status'] = 'unapproved';
        Article::create($data);

        return [
            'status' => 'success',
            'redirect' => route('user-article.own-index')
        ];
    }

    public function edit(Article $article)
    {
        $article->original_status = $article->getOriginal('status');
        $categories = Category::select('id', 'name')->get();

        return view('user-article.edit', compact('article', 'categories'));
    }

    public function update(Article $article)
    {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => ['required', Rule::unique('articles')->ignore($article->id)],
            'content' => 'required|string',
            'category_id' => ['required', Rule::in($category_ids)]
        ]);

        $article->update($data);

        session()->flash('message.success', __('messages.update.success'));
    }

    public function read(Article $article)
    {
        $article->load('category:id,name', 'poster:id,name');
        return view('user-article.read', compact('article'));
    }

    public function delete(Article $article)
    {
        $article->delete();

        return back()
            ->with('message.success', __('messages.delete.success'));
    }
}
