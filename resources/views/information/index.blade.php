@extends('shared.layout')
@section('title', $information->menu_title)
@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-body">
           <h4>
                {{ $information->title }}
           </h4>
           
           <hr>

            <article id="content">
                {!! $information->content !!}
            </article>
        </div>
    </div>
</div>
@endsection