<?php

namespace App\Http\Controllers;

use App\Bibit;

class BibitController extends Controller
{
    public function index()
    {
        $bibits = Bibit::query()
            ->select(
                "id",
                "spesies",
                "famili",
            )->paginate();

        return view("bibit.index", compact("bibits"));
    }

    public function create()
    {
        return view("bibit.create");
    }

    public function store()
    {
    }

    public function edit(Bibit $bibit)
    {
    }

    public function update(Bibit $bibit)
    {
    }

    public function delete(Bibit $bibit)
    {
        $bibit->delete();
        return back()
            ->with("message.success", __('messages.delete.success'));
    }
}
