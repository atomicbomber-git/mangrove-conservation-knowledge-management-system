@extends('shared.layout')
@section('title', 'Pengalaman')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-address-book'></i>
        Pengalaman
    </h1>

    <div class="card">
        <div class="card-body">
            @inject('formatter', 'App\Helpers\FormatterInterface')

            @foreach ($pengalamans as $pengalaman)
            <div class="mb-3">
                <a href="{{ route('pengalaman.guest.detail', $pengalaman) }}" class="d-block text-primary h5 mb-1">
                    {{ $pengalaman->judul }}
                </a>
                <div>
                    <span class="badge badge-primary"> {{ $pengalaman->tema }} </span>
                </div>
                <div class="small">
                    {{ $formatter->localizedDatetime($pengalaman->created_at) }} oleh <span class="text-primary font-weight-bold"> {{ $pengalaman->poster->name }} </span>
                </div>
                <p>
                    {{ \Illuminate\Support\Str::limit($pengalaman->cerita) }}
                </p>
            </div>


            @endforeach

            <div class="alert alert-info mb-5">
                Menampilkan pengalaman ke {{ $pengalamans->firstItem() }}-{{ $pengalamans->lastItem() }}
                dari {{ $pengalamans->total() }} pengalaman yang ada
            </div>

            <div class="d-flex justify-content-center p-4">
                <div style="overflow-x: scroll">
                    {{ $pengalamans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
