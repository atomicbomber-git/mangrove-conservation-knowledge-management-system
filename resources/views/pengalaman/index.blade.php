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
            <a href="" class="d-block text-muted">
                {{ $pengalaman->tema }}
            </a>
            <div class="small">
                {{ $formatter->localizedDate($pengalaman->created_at) }} oleh <span class="text-primary font-weight-bold"> {{ $pengalaman->poster->name }} </span>
            </div>
            <p>
                {{ $pengalaman->cerita }}
            </p>

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
