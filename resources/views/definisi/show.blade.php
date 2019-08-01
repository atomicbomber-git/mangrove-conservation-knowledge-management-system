@extends('shared.layout')
@section('title', 'Sunting Definisi')
@section('content')
<div class="container my-5">
    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-body">
            <h1 class="h3 mb-1"> {{ $definisi->title }} </h1>
            <hr class="mt-1 mb-4">

            {{ $definisi->content }}
        </div>
    </div>

</div>
@endsection
