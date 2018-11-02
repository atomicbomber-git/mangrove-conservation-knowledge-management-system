<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')
            ->withCount('articles')
            ->get()
            ->map(function ($category) {
                $category->deletable = $category->articles_count == 0;
                return $category;
            });

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'name' => 'required|string|unique:categories'
        ]);

        Category::create($data);

        return redirect()
            ->route('category.index')
            ->with('message.success', __('messages.create.success'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $data = $this->validate(request(), [
            'name' => ['required', 'string', Rule::unique('categories')->ignore($category->id)]
        ]);
        
        $category->update($data);

        return back()
            ->with('message.success', __('messages.update.success'));
    }

    public function delete(Category $category)
    {
        if ($category->articles()->count() != 0) {
            abort(422);
        }

        $category->delete();

        return back()
            ->with('message.success', __('messages.delete.success'));
    }
}
