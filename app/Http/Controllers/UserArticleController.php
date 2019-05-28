<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Article;
use App\Category;

class UserArticleController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')
            ->orderBy('name')
            ->get()
            ->map(function($category) {
                $category->articles = Article::query()
                    ->select('id', 'title', 'poster_id', 'published_date', 'author_first_name', 'author_last_name', 'publisher_media')
                    ->where('status', 'approved')
                    ->limit(3)
                    ->orderByDesc('published_date')
                    ->where('category_id', $category->id)->get(); 
                return $category;
            });

        return view('user-article.index', compact('categories'));
    }

    public function filteredIndex()
    {
        $categoryId = request('category_id');
        
        if (empty($categoryId)) {
            abort(404);
        }

        $category = Category::find($categoryId);

        $articles = Article::query()
            ->where('category_id', $categoryId)
            ->where('status', 'approved')
            ->select('id', 'title', 'poster_id', 'status', 'published_date', 'publisher_media')
            ->with('poster:id,first_name,last_name')
            ->orderByDesc('published_date')
            ->get();

        return view('user-article.filtered-index', compact('category', 'articles'));
    }

    public function ownIndex()
    {
        $articles = Article::query()
            ->select(
                'id', 'title', 'category_id', 'poster_id', 'published_date', 'status',
                'author_first_name', 'author_last_name', 'publisher_media'
            )
            ->with('poster:id,first_name,last_name', 'category:id,name')
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
            'author_first_name' => 'required|string',
            'author_last_name' => 'required|string',
            'category_id' => ['required', Rule::in($category_ids)],
            'publisher_media' => 'required|string',
        ]);

        $data['poster_id'] = auth()->user()->id;
        $data['status'] = Article::STATUS_UNAPPROVED;
        Article::create($data);

        return redirect()
            ->route("user-article.own-index")
            ->with('message.success', __('messages.update.success'));
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
            'author_first_name' => 'required|string',
            'author_last_name' => 'required|string',
            'category_id' => ['required', Rule::in($category_ids)]
        ]);

        $article->update($data);

        return back()
            ->with('message.success', __('messages.update.success'));
    }

    public function read(Article $article)
    {
        $article->load('category:id,name', 'poster:id,first_name,last_name');
        return view('user-article.read', compact('article'));
    }

    public function delete(Article $article)
    {
        $article->delete();

        return back()
            ->with('message.success', __('messages.delete.success'));
    }
}
