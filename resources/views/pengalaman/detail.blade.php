@extends('shared.layout')
@section('title', 'Detail Pengalaman')
@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            @include('pengalaman.detail-content')
        </div>
    </div>

</div>
@endsection
