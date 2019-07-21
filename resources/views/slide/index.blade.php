@extends('shared.layout')
@section('title', 'Kelola Slide')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-image'></i>
        Kelola Slide
    </h1>

    @foreach ($slides as $slide)
    <div class='card d-inline-block mr-2' style='width: 320px;'>
        <img class='card-img-top'
            style="width: 320px; height: 240px; object-fit: cover"
            src='{{ route('slide.image', $slide) }}' alt='Gambar Slide'>
        <div class='card-body'>
            <h5 class='card-title'> {{ $slide->name }} </h5>
            <p class='card-text'>
                {{ $slide->description }}
            </p>
            <div class="text-right">
                <a href="{{ route('slide.edit', $slide) }}" class="btn btn-secondary">
                    Sunting
                    <i class="fa fa-pencil"></i>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
