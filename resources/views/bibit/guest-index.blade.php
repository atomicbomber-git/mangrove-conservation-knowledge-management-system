@extends('shared.layout')
@section('title', 'Bibit')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class="fa fa-tree" aria-hidden="true"></i>
        Bibit
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    @foreach ($bibits as $bibit)
    <div class="mb-3">
        <a href="{{ route('bibit.guest.show', $bibit) }}" class="d-block text-primary h5 mb-1">
            {{ $bibit->spesies }}
        </a>
        <div class="small">
            {{ $bibit->deskripsi ?? '-' }}
        </div>
    </div>
    @endforeach

    <div class="alert alert-info mb-5">
        Menampilkan bibit ke {{ $bibits->firstItem() }}-{{ $bibits->lastItem() }}
        dari {{ $bibits->total() }} bibit yang ada
    </div>

    <div class="d-flex justify-content-center p-4">
        <div style="overflow-x: scroll">
            {{ $bibits->links() }}
        </div>
    </div>
</div>
@endsection
