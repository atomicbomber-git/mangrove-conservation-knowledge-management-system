<?php

namespace App\Http\Controllers;

use App\Bibit;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class BibitController extends Controller
{
    public function index()
    {
        $bibits = Bibit::query()
            ->select(
                "id",
                "spesies",
                "famili"
            )
            ->orderBy("famili")
            ->orderBy("spesies")
            ->get();

        return view("bibit.index", compact("bibits"));
    }

    public function guestIndex()
    {
        $bibits = Bibit::query()
            ->select(
                "id",
                "spesies",
                "deskripsi"
            )
            ->orderBy("famili")
            ->orderBy("spesies")
            ->paginate();

        return view("bibit.guest-index", compact("bibits"));
    }

    public function image(Bibit $bibit)
    {
        return response()->file($bibit->getFirstMediaPath(config('media.collections.images')));
    }

    public function show(Bibit $bibit)
    {
        return view("bibit.show", compact("bibit"));
    }

    public function guestShow(Bibit $bibit)
    {
        return view("bibit.guest-show", compact("bibit"));
    }

    public function create()
    {
        return view("bibit.create");
    }

    public function store()
    {
        $data = $this->validate(request(), [
            "spesies" => "required|string|unique:bibits",
            "image" => "required|file|mimes:jpg,png,jpeg",
            "famili" => "required|string",
            "deskripsi" => "nullable|string",
            "daun" => "nullable|string",
            "bunga" => "nullable|string",
            "buah" => "nullable|string",
            "ekologi" => "nullable|string",
            "penyebaran" => "nullable|string",
            "kelimpahan" => "nullable|string",
            "manfaat" => "nullable|string",
            "catatan" => "nullable|string",
        ]);

        DB::transaction(function() use($data) {
            Bibit::create($data)
                ->addMediaFromRequest("image")
                ->toMediaCollection(config("media.collections.images"));
        });

        return redirect()
            ->route("bibit.index")
            ->with("message.success", __('messages.create.success'));
    }

    public function edit(Bibit $bibit)
    {
        return view('bibit.edit', compact('bibit'));
    }

    public function update(Bibit $bibit)
    {
        $data = $this->validate(request(), [
            "spesies" => ["required", "string", Rule::unique("bibits")->ignore($bibit->id)],
            "famili" => "required|string",
            "deskripsi" => "nullable|string",
            "daun" => "nullable|string",
            "bunga" => "nullable|string",
            "buah" => "nullable|string",
            "ekologi" => "nullable|string",
            "penyebaran" => "nullable|string",
            "kelimpahan" => "nullable|string",
            "manfaat" => "nullable|string",
            "catatan" => "nullable|string",
        ]);

        $bibit->update($data);

        return back()
            ->with("message.success", __('messages.update.success'));
    }

    public function delete(Bibit $bibit)
    {
        $bibit->delete();
        return back()
            ->with("message.success", __('messages.update.success'));
    }
}
