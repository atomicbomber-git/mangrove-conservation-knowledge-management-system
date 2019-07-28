<?php

namespace App\Http\Controllers;

use App\ProgramPemerintah;
use Illuminate\Support\Facades\DB;

class ProgramPemerintahController extends Controller
{
    public function index()
    {
        $programPemerintahs = ProgramPemerintah::query()
            ->select("id", "nama", "tanggal_mulai", "tanggal_selesai", "dana", "penanggung_jawab", "lokasi")
            ->orderBy("tanggal_mulai", "desc")
            ->orderBy("tanggal_selesai", "desc")
            ->get();

        return view("program_pemerintah.index", compact("programPemerintahs"));
    }

    public function guestIndex()
    {
        $programPemerintahs = ProgramPemerintah::query()
            ->select("id", "nama", "tanggal_mulai", "tanggal_selesai", "dana", "penanggung_jawab", "lokasi")
            ->orderBy("tanggal_mulai", "desc")
            ->orderBy("tanggal_selesai", "desc")
            ->paginate();

        return view("program_pemerintah.guest-index", compact("programPemerintahs"));
    }

    public function guestDetail(ProgramPemerintah $programPemerintah)
    {
        return view("program_pemerintah.guest-detail", compact("programPemerintah"));
    }

    public function show(ProgramPemerintah $programPemerintah)
    {
        return view("program_pemerintah.show", compact("programPemerintah"));
    }

    public function create()
    {
        return view("program_pemerintah.create");
    }

    public function image(ProgramPemerintah $programPemerintah)
    {
        return response()->file(
            $programPemerintah
                ->getFirstMedia(config("media.collections.images"))->getPath()
        );
    }

    public function store()
    {
        $data = $this->validate(request(), [
            "nama" => "required|unique:program_pemerintahs|max:255",
            "image" => "required|file|mimes:png,jpg,jpeg",
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
            "lokasi" => "required|string|max:100",
        ]);

        DB::transaction(function() use($data) {
            $programPemerintah = ProgramPemerintah::create($data);
            $programPemerintah
                ->addMediaFromRequest('image')
                ->toMediaCollection(config('media.collections.images'));
        });

        return redirect()
            ->route("program-pemerintah.index")
            ->with("message.success", __('messages.create.success'));
    }

    public function edit(ProgramPemerintah $programPemerintah)
    {
        return view("program_pemerintah.edit", compact("programPemerintah"));
    }

    public function update(ProgramPemerintah $programPemerintah)
    {

        $data = $this->validate(request(), [
            "nama" => ["required", "max:255"],
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
            "lokasi" => "required|string|max:100",
        ]);

        DB::transaction(function() use($data, $programPemerintah) {
            $programPemerintah->update($data);
            $programPemerintah->clearMediaCollection(config('media.collections.images'));
            $programPemerintah->addMediaFromRequest('image')
                ->toMediaCollection(config('media.collections.images'));
        });

        return back()
            ->with("message.success", __('messages.update.success'));
    }

    public function delete(ProgramPemerintah $programPemerintah)
    {
        $programPemerintah->delete();
        return back()
            ->with("message.success", __('messages.delete.success'));
    }
}
