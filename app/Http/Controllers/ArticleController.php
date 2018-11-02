<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'title', 'status')
            ->orderBy('created_at')
            ->get();

        return view('article.index', compact('articles'));
    }

    public function store() {
        $data = $this->validate(request(), [
            'title' => 'required|string|unique:articles',
            'content' => 'required|string',
        ]);

        $data['poster_id'] = auth()->user()->id;
        Article::create($data);

        return [
            'status' => 'success',
            'redirect' => route('article.index')
        ];
    }

    public function create()
    {
        return view('article.create');
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
        return view('article.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $data = $this->validate(request(), [
            'title' => ['required', Rule::unique('articles')->ignore($article->id)],
            'content' => 'required|string',
            'status' => ['required', Rule::in(array_keys(Article::STATUSES))]
        ]);
            
        $article->update($data);

        session()->flash('message.success', __('messages.update.success'));
    }
}
