@extends('shared.layout')
@section('title', 'Mangrove')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-tree'></i>
        {{ $records['title'] }}
    </h1>

    <article style="font-size: 110%" id="content">
        {!! $records['content'] !!}
    </article>
</div>
@endsection