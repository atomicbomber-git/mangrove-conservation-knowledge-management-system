<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Research;
use App\Category;
use App\Author;

class UserResearchController extends Controller
{
    public function index()
    {
        $researches = Research::select('id', 'title', 'year', 'description', 'category_id', 'poster_id')
            ->where('status', 'approved')
            ->with('authors:id,research_id,first_name,last_name', 'category:id,name')
            ->orderByDesc('year')
            ->get()
            ->each(function ($research) {

                $author_names = $research->authors
                    ->map(function ($author) {
                        return rtrim($author->first_name . " " . $author->last_name);
                    })
                    ->toArray();

                $research->formatted_authors = implode(", ", $author_names); 
            });

        return view('user-research.index', compact('researches'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
            ->get();

        return view('user-research.create', compact('categories'));
    }

    public function store()
    {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => 'required|string|unique:researches',
            'category_id' => ['required', Rule::in($category_ids)],
            'authors' => 'required|array',
            'authors.*.first_name' => 'required|string',
            'authors.*.last_name' => 'nullable|string',
            'document' => 'required|mimes:pdf',
            'description' => 'required|string',
            'year' => 'required|integer|gte:1900'
        ]);
        
        $data['poster_id'] = auth()->user()->id;

        DB::transaction(function() use($data) {
            $research = Research::create($data);

            foreach ($data["authors"] as $author) {
                Author::create([
                    'research_id' => $research->id,
                    'first_name' => $author['first_name'],
                    'last_name' => $author['last_name']
                ]);
            }

            $research
                ->addMediaFromRequest('document')
                ->toMediaCollection(config('media.collections.documents'));
        });

        session()->flash('message.success', __('messages.create.success'));
    }

    public function ownIndex()
    {
        $researches = Research::select('id', 'title', 'category_id', 'poster_id', 'status')
            ->with('category:id,name')
            ->where('poster_id', auth()->user()->id)
            ->orderByDesc('created_at')
            ->get();

        return view('user-research.own-index', compact('researches'));
    }

    public function edit(Research $research)
    {
        $research->original_status = $research->getOriginal('status');
        $research->load('authors:id,research_id,first_name,last_name');
        $categories = Category::select('id', 'name')->get();

        return view('user-research.edit', compact('research', 'categories'));
    }

    public function detail(Research $research)
    {
        $research->load('authors:id,first_name,last_name,research_id');
        return view('user-research.detail', compact('research'));
    }


    public function update(Research $research)
    {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => ['required', 'string', 'max:191', Rule::unique('researches')->ignore($research->id)],
            'authors' => 'required|array',
            'authors.*.first_name' => 'required|string',
            'authors.*.last_name' => 'nullable|string',
            'category_id' => ['required', Rule::in($category_ids)],
            'document' => 'sometimes|nullable|mimes:pdf',
            'description' => 'required|string',
            'year' => 'required|integer|gte:1900'
        ]);

        DB::transaction(function() use($research, $data) {
            $research->update($data);
            
            Author::where('research_id', $research->id)
                ->delete();

            foreach ($data["authors"] as $author) {
                Author::create([
                    'research_id' => $research->id,
                    'first_name' => $author['first_name'],
                    'last_name' => $author['last_name']
                ]);
            }

            if (empty($data['document'])) { return; }

            $research->clearMediaCollection(config('media.collections.documents'));
            $research->addMediaFromRequest('document')
                ->toMediaCollection(config('media.collections.documents'));
        });

        session()->flash('message.success', __('messages.update.success'));
    }

    public function delete(Research $research)
    {
        $research->delete();
        return back()
            ->with('message.success', __('messages.delete.success'));
    }
}
