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
        return view("program_pemerintah.show", compact("programPemerintah"));
    }

    public function create()
    {
        return view("program_pemerintah.create");
    }

    public function store()
    {
        $data = $this->validate(request(), [
            "nama" => "required|unique:program_pemerintahs|max:255",
            "tanggal_mulai" => "required|date",
            "tanggal_selesai" => "required|date",
            "dana" => "required|numeric",
            "penanggung_jawab" => "required|string|max:255",
            "nama_instansi" => "required|string|max:255",
            "nama_instansi_penerima" => "required|string|max:255",
            "penanggung_jawab_penerima" => "required|string|max:255",
            "bentuk" => "required|string|max:1000",
            "hasil" => "required|string|max:1000",
            "persentase_hasil" => "required|numeric|gte:0|lte:100",
        ]);

        ProgramPemerintah::create($data);
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
