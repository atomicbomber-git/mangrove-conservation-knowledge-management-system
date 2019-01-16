@extends('shared.layout')
@section('title', $information->menu_title)
@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Informasi {{ $information->menu_title }}
        </div>
        <div class="card-body" id="app">
            <information-edit/>
        </div>
    </div>
</div>
@javascript('information', $information)
@endsection