@extends('shared.layout')
@section('title', 'Program Pemerintah')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-product-hunt'></i>
        Program Pemerintah
    </h1>

    <div class="card">
        <div class="card-body">
            @inject('formatter', 'App\Helpers\FormatterInterface')

            @foreach ($programPemerintahs as $programPemerintah)
            <div class="mb-3">
                <a href="{{ route('program-pemerintah.guest.detail', $programPemerintah) }}" class="d-block text-primary h5 mb-1">
                    {{ $programPemerintah->nama }}
                </a>
                <div class="small">
                    {{ $formatter->localizedDate($programPemerintah->tanggal_mulai) }} - {{ $formatter->localizedDate($programPemerintah->tanggal_selesai) }} di
                    <span class="font-weight-bold"> {{ $programPemerintah->lokasi }} </span>
                </div>
            </div>
            @endforeach

            <div class="alert alert-info mb-5">
                Menampilkan pengalaman ke {{ $programPemerintahs->firstItem() }}-{{ $programPemerintahs->lastItem() }}
                dari {{ $programPemerintahs->total() }} pengalaman yang ada
            </div>

            <div class="d-flex justify-content-center p-4">
                <div style="overflow-x: scroll">
                    {{ $programPemerintahs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
