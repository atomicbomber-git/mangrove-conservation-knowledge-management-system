@extends('shared.layout')
@section('title', 'Detail Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-list'></i>
        Detail Hasil Penelitian
    </h1>

    <div class="card">
        <div class="card-body">
            <h1> {{ $research->title }} </h1>
            <p class="lead"> {{ join(", ", $research->authors->pluck("name")->toArray()) }} </p>
            <span class="badge badge-primary"> {{ $research->year }} </span>
            
            <div class="text-right">
                <a href="{{ route('research.document', $research) }}" class="btn btn-default">
                    Unduh Dokumen <i class="fa fa-download"></i>
                </a>
            </div>
            <hr class="mt-0 mb-4">
            {{ $research->description }}
        </div>
    </div>
</div>
@endsection