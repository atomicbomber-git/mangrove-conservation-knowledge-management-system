<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramPemerintah;
use App\Bibit;

class ProgramPemerintahController extends Controller
{
    public function index()
    {
        $programPemerintahs = ProgramPemerintah::query()
            ->select("id", "nama", "tanggal_mulai", "tanggal_selesai", "dana", "penanggung_jawab")
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
            ->select("nama")
            ->get();

        return view("program_pemerintah.create", compact("bibits"));
    }

    public function store()
    {
        $data = $this->validate(request(), [
            "nama" => "required",
            "tanggal_mulai" => "required",
            "tanggal_selesai" => "required",
            "dana" => "required",
            "penanggung_jawab" => "required",
            "bibits" => "required|array",
        ]);

return $data;
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
