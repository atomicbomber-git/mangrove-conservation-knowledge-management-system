<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bibit;
use Illuminate\Validation\Rule;

class BibitController extends Controller
{
    public function index()
    {
        $bibits = Bibit::query()
            ->select("id", "nama")
            ->withCount("program_pemerintahs")
            ->get();

        return view("bibit.index", compact("bibits"));
    }

    public function create()
    {
        return view("bibit.create");
    }

    public function store()
    {
        $data = $this->validate(request(), [
            "nama" => "required|string|unique:bibits",
        ]);

        Bibit::create($data);

        return redirect()
            ->route('bibit.index')
            ->with('message.success', __('messages.create.success'));
    }

    public function edit(Bibit $bibit)
    {
        return view("bibit.edit", compact("bibit"));
    }

    public function update(Bibit $bibit)
    {
        $data = $this->validate(request(), [
            "nama" => ["required", "string", Rule::unique("bibits")->ignore($bibit->id)]
        ]);

        $bibit->update($data);

        return back()
            ->with('message.success', __('messages.update.success'));
    }

    public function delete(Bibit $bibit)
    {
        if ($bibit->has_related_entities) {
            return back()
                ->with('message_state', 'danger')
                ->with('message_text', __('messages.delete.failure'));
        }

        $bibit->delete();

        return redirect()
            ->route('bibit.index')
            ->with('message.success', __('messages.delete.success'));
    }
}
