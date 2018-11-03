<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Research;
use App\Category;

class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::select('id', 'title', 'poster_id', 'category_id')
            ->with('poster:id,name', 'category:id,name')
            ->get();

        return view('research.index', compact('researches'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
            ->get();

        return view('research.create', compact('categories'));
    }

    public function store()
    {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => 'required|unique:researches',
            'category_id' => ['required', Rule::in($category_ids)],
            'document' => 'required|mimes:pdf'
        ]);
        
        $data['poster_id'] = auth()->user()->id;

        DB::transaction(function() use($data) {
            $research = Research::create($data);

            $research->addMediaFromRequest('document')
            ->toMediaCollection(config('media.collections.documents'));
        });

        return redirect()
            ->route('research.index')
            ->with('message.success', __('messages.create.success'));
    }

    public function delete(Research $research)
    {
        $research->delete();
        return back()
            ->with('message.success', __('messages.delete.success'));
    }

    public function document(Research $research)
    {
        return response()->file($research->getFirstMedia('documents')->getPath());
    }
}
