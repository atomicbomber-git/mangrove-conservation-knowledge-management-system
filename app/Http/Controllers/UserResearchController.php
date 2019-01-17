<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Research;
use App\Category;

class UserResearchController extends Controller
{
    public function index()
    {
        $researches = Research::select('id', 'title', 'year', 'description', 'category_id', 'poster_id')
            ->where('status', 'approved')
            ->with('poster:id,first_name,last_name', 'category:id,name')
            ->orderByDesc('year')
            ->get();

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
            'title' => 'required|unique:researches',
            'category_id' => 'required|exists:categories,id',
            'document' => 'required|mimes:pdf'
        ]);
        
        $data['poster_id'] = auth()->user()->id;

        DB::transaction(function() use($data) {
            $research = Research::create($data);

            $research->addMediaFromRequest('document')
            ->toMediaCollection(config('media.collections.documents'));
        });

        return redirect()
            ->route('user-research.index')
            ->with('message.success', __('messages.create.success'));
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
        $categories = Category::select('id', 'name')->get();

        return view('user-research.edit', compact('research', 'categories'));
    }

    public function update(Research $research)
    {
        $data = $this->validate(request(), [
            'title' => ['required', 'string', 'max:191', Rule::unique('researches')->ignore($research->id)],
            'category_id' => 'required|exists:categories,id',
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
}
