<?php

namespace App\Http\Controllers;

use App\Pengalaman;
use Illuminate\Validation\Rule;

class PengalamanController extends Controller
{
    public function index()
    {
        $pengalamans = Pengalaman::query()
            ->select("id", "tema", "cerita", "created_at", "poster_id")
            ->with("poster:id,first_name,last_name")
            ->orderBy("created_at", "desc")
            ->paginate();

        return view("pengalaman.index", compact("pengalamans"));
    }

    public function guestIndex()
    {
        $pengalamans = Pengalaman::query()
            ->select("id", "tema", "cerita", "created_at", "poster_id")
            ->with("poster:id,first_name,last_name")
            ->orderBy("created_at", "desc")
            ->paginate();

        return view("pengalaman.guest-index", compact("pengalamans"));
    }

    public function guestDetail(Pengalaman $pengalaman)
    {
        return view("pengalaman.guest-detail", compact("pengalaman"));
    }

    public function ownIndex()
    {
        $pengalamans = auth()->user()->pengalamans()
            ->select("id", "tema", "cerita", "created_at", "poster_id")
            ->orderBy("created_at", "desc")
            ->get();

        return view("pengalaman.own-index", compact("pengalamans"));
    }

    public function create()
    {
        return view("pengalaman.create");
    }

    public function store()
    {
        $data = $this->validate(request(), [
            "tema" => "required|string|max:255|unique:pengalamans",
            "cerita" => "required|string|max:1000",
            "pengaduan" => "required|string|max:1000",
            "keluhan" => "required|string|max:1000",
            "saran" => "required|string|max:1000",
        ]);

        auth()->user()->pengalamans()
            ->create($data);

        return redirect()
            ->route("pengalaman.own-index")
            ->with("message.success", __('messages.create.success'));
    }

    public function edit(Pengalaman $pengalaman)
    {
        return view("pengalaman.edit", compact("pengalaman"));
    }

    public function update(Pengalaman $pengalaman)
    {
        $data = $this->validate(request(), [
            "tema" => ["required", "string", "max:255", Rule::unique("pengalamans")->ignore($pengalaman->id)],
            "cerita" => "required|string|max:1000",
            "pengaduan" => "required|string|max:1000",
            "keluhan" => "required|string|max:1000",
            "saran" => "required|string|max:1000",
        ]);

        $pengalaman->update($data);

        return back()
            ->with("message.success", __('messages.update.success'));
    }

    public function delete(Pengalaman $pengalaman)
    {
        $pengalaman->delete();
        return back()
            ->with("message.success", __('messages.delete.success'));
    }
}
