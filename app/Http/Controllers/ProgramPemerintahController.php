<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramPemerintah;
use App\Bibit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProgramPemerintahController extends Controller
{
    public function index()
    {
        $programPemerintahs = ProgramPemerintah::query()
            ->select("id", "nama", "tanggal_mulai", "tanggal_selesai", "dana", "penanggung_jawab")
            ->orderBy("tanggal_mulai", "desc")
            ->orderBy("tanggal_selesai", "desc")
            ->get();

        return view("program_pemerintah.index", compact("programPemerintahs"));
    }

    public function show(ProgramPemerintah $programPemerintah)
    {
        $programPemerintah->load("bibits");
        return view("program_pemerintah.show", compact("programPemerintah"));
    }

    public function create()
    {
        $bibits = Bibit::query()
            ->select("id", "nama")
            ->get();

        return view("program_pemerintah.create", compact("bibits"));
    }

    public function store()
    {
        $data = $this->validate(request(), [
            "nama" => "required|unique:program_pemerintahs",
            "tanggal_mulai" => "required",
            "tanggal_selesai" => "required",
            "dana" => "required|numeric",
            "penanggung_jawab" => "required|string",
            "bibits" => "required|array",
            "bibits.*.id" => "required|numeric",
            "bibits.*.jumlah" => "required|numeric|gt:0",
        ]);

        DB::transaction(function() use ($data) {
            $programPemerintahData = collect($data)->except("bibits")->toArray();
            $programPemerintah = ProgramPemerintah::create($programPemerintahData);
            foreach ($data["bibits"] as $bibit) {
                $bibitModelObject = Bibit::find($bibit["id"]);
                $programPemerintah->bibits()->attach($bibitModelObject, [
                    "jumlah" => $bibit["jumlah"],
                ]);
            }
        });

        Session::flash("message.success", __('messages.create.success'));
    }

    public function edit(ProgramPemerintah $programPemerintah)
    {
    }

    public function update(ProgramPemerintah $programPemerintah)
    {
    }

    public function delete(ProgramPemerintah $programPemerintah)
    {
    }
}
