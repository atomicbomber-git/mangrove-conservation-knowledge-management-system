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
        $researches = Research::select('id', 'title', 'poster_id', 'category_id', 'status')
            ->with('poster:id,first_name,last_name', 'category:id,name')
            ->orderBy('status')
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
            'document' => 'required|mimes:pdf',
            'description' => 'string|required',
            'year' => 'integer|gte:1900'
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

    public function edit(Research $research)
    {
        $categories = Category::select('id', 'name')->get();

        return view('research.edit', compact('research', 'categories'));
    }

    public function update(Research $research)
    {
        $category_ids = Category::select('id')->pluck('id');

        $data = $this->validate(request(), [
            'title' => ['required', 'string', 'max:191', Rule::unique('researches')->ignore($research->id)],
            'status' => ['required', Rule::in(array_keys(Research::STATUSES))],
            'category_id' => ['required', Rule::in($category_ids)],
            'document' => 'sometimes|nullable|mimes:pdf'
        ]);

        DB::transaction(function() use($research, $data) {
            $research->update($data);
            $research->clearMediaCollection(config('media.collections.documents'));
            
            if (empty($data['document'])) {
                return;
            }

            $research->addMediaFromRequest('document')
                ->toMediaCollection(config('media.collections.documents'));
        });

        return back()
            ->with('message.success', __('messages.update.success'));
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
