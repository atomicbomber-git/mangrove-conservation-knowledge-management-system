@extends('shared.layout')
@section('title', 'Halaman Utama')
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slides as $slide)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img class="d-block w-100" style="height: 600px; object-fit: cover; filter: brightness(90%)" src="{{ route('slide.image', $slide) }}" alt="{{ $slide->name }}">
            <div class="carousel-caption d-none d-md-block">
                <h5> {{ $slide->name }} </h5>
                <p> {{ $slide->description }} </p>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-home'></i>
        Knowledge Management System Konservasi Mangrove
    </h1>
    
    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius, at suscipit tempora nesciunt enim commodi beatae provident asperiores quod modi consectetur ex dolorum molestiae expedita voluptatem. Aperiam sed reiciendis neque.
    </p>
</div>
@endsection

@section('extra-scripts')
<script>
    $('.carousel').carousel()
</script>
@endsection