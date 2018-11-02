<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'title', 'status', 'category_id')
            ->with('category:id,name')
            ->orderBy('created_at')
            ->get();

        return view('article.index', compact('articles'));
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
            'redirect' => route('article.index')
        ];
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('article.create', compact('categories'));
    }

    public function delete(Article $article)
    {
        $article->delete();

        return back()
            ->with('message.success', __('messages.delete.success'));
    }

    public function edit(Article $article)
    {
        $article->original_status = $article->getOriginal('status');
        $categories = Category::select('id', 'name')->get();

        return view('article.edit', compact('article', 'categories'));
    }

    public function update(Article $article)
    {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => ['required', Rule::unique('articles')->ignore($article->id)],
            'content' => 'required|string',
            'status' => ['required', Rule::in(array_keys(Article::STATUSES))],
            'category_id' => ['required', Rule::in($category_ids)]
        ]);

        $article->update($data);

        session()->flash('message.success', __('messages.update.success'));
    }
}
