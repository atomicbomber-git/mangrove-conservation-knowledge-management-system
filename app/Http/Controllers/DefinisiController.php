<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Definisi;

class DefinisiController extends Controller
{
    public function index()
    {
        $this->authorize("viewAny", Definisi::class);

        $definisis = Definisi::query()
            ->select(
                "id",
                "title"
            )
            ->get();

        return view("definisi.index", compact("definisis"));
    }

    public function show(Definisi $definisi)
    {
        return view("definisi.show", compact("definisi"));
    }

    public function create()
    {
        $this->authorize("create", Definisi::class);
        return view("definisi.create");
    }

    public function store()
    {
        $this->authorize("create", Definisi::class);

        $data = $this->validate(request(), [
            "title" => ["required", "string", "max:3000", "unique:definisis"],
            "content" => ["required", "string", "max:300000"],
        ]);

        Definisi::create($data);
        return redirect()
            ->route("definisi.index")
            ->with("message.success", __('messages.create.success'));
    }

    public function edit(Definisi $definisi)
    {
        $this->authorize("update", $definisi);
        return view("definisi.edit", compact("definisi"));
    }

    public function update(Definisi $definisi)
    {
        $this->authorize("update", $definisi);
        $data = $this->validate(request(), [
            "title" => ["required", "string", "max:3000", Rule::unique("definisis")->ignore($definisi->id)],
            "content" => ["required", "string", "max:300000"],
        ]);

        $definisi->update($data);

        return redirect()
            ->route("definisi.edit", $definisi)
            ->with("message.success", __('messages.update.success'));
    }

    public function delete(Definisi $definisi)
    {
        $this->authorize("delete", $definisi);
        $definisi->delete();
        return redirect()
            ->route("definisi.index")
            ->with("message.success", __('messages.delete.success'));
    }
}
