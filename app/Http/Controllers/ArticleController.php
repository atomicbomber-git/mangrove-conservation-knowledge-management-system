<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->select(
                'id', 'title', 'author_first_name', 'author_last_name',
                'status', 'category_id', 'poster_id', 'published_date',
                'publisher_media',
                DB::raw("(status = 'APPROVED') AS is_approved")
            )
            ->with('category:id,name', 'poster:id,first_name,last_name')
            ->orderByDesc('is_approved')
            ->orderByDesc('status')
            ->orderByDesc('published_date')
            ->get();

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('article.create', compact('categories'));
    }

    public function store() {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => 'required|string|unique:articles',
            'content' => 'required|string',
            'author_first_name' => 'required|string',
            'author_last_name' => 'nullable|string',
            'category_id' => ['required', Rule::in($category_ids)],
            'publisher_media' => 'required|string',
        ]);

        Article::create(array_merge($data, [
            "poster_id" => Auth::user()->id,
            "status" => Article::STATUS_APPROVED,
            "published_date" => now(),
            "publisher_media" => $data["publisher_media"],
        ]));

        return redirect()
            ->route("article.index")
            ->with('message.success', __('messages.create.success'));
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
            'category_id' => ['required', Rule::in($category_ids)],
            'author_first_name' => 'required|string',
            'author_last_name' => 'required|string',
            'publisher_media' => 'required|string',
        ]);

        $article->update($data);
        return back()
            ->with('message.success', __('messages.update.success'));
    }

    public function delete(Article $article)
    {
        $article->delete();

        return back()
            ->with('message.success', __('messages.delete.success'));
    }
}
