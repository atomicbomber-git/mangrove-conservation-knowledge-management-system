<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Research;
use App\Category;
use App\Author;

class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::select('id', 'title', 'year', 'poster_id', 'category_id', 'status')
            ->with('poster:id,first_name,last_name', 'category:id,name')
            ->with('authors:id,first_name,last_name,research_id')
            ->orderBy('status')
            ->orderByDesc('year')
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
            'title' => 'required|string|unique:researches',
            'category_id' => ['required', Rule::in($category_ids)],
            'authors' => 'required|array',
            'authors.*.first_name' => 'required|string',
            'authors.*.last_name' => 'nullable|string',
            'document' => 'required|mimes:pdf',
            'description' => 'required|string',
            'year' => 'required|integer|gte:1900',
            'journal_name' => 'nullable|string',
            'volume' => 'nullable|string',
        ]);

        $data['poster_id'] = auth()->user()->id;
        $data['status'] = Research::STATUS_APPROVED;

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

    public function detail(Research $research)
    {
        $research->load('authors:id,first_name,last_name,research_id');
        return view('research.detail', compact('research'));
    }

    public function edit(Research $research)
    {
        $research->original_status = $research->getOriginal('status');
        $research->load('authors:id,research_id,first_name,last_name');
        $categories = Category::select('id', 'name')->get();

        return view('research.edit', compact('research', 'categories'));
    }

    public function update(Research $research)
    {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => ['required', 'string', 'max:191', Rule::unique('researches')->ignore($research->id)],
            'status' => ['required', Rule::in(array_keys(Research::STATUSES))],
            'authors' => 'required|array',
            'authors.*.first_name' => 'required|string',
            'authors.*.last_name' => 'nullable|string',
            'category_id' => ['required', Rule::in($category_ids)],
            'description' => 'required|string',
            'document' => 'sometimes|nullable|mimes:pdf',
            'year' => 'required|integer|gte:1900',
            'journal_name' => 'nullable|string',
            'publisher_location' => 'nullable|string',
            'volume' => 'nullable|string',
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
        DB::transaction(function() use($research) {
            $research->authors()->delete();
            $research->delete();
        });

        return back()
            ->with('message.success', __('messages.delete.success'));
    }

    public function document(Research $research)
    {
        return response()->file($research->getFirstMedia('documents')->getPath());
    }
}
