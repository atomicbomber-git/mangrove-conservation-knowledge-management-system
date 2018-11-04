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
        Knowledge Management System Konservasi Mangrove
        <small class="text-muted">
            <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus culpa ea officiis aliquid veritatis doloremque iusto quaerat optio corporis id quia autem dolores tenetur quis repellat doloribus atque, provident ad.
            </p>
        </small>
    </h1>
    
    <div class="row">
        <div class="col-9">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius, at suscipit tempora nesciunt enim commodi beatae provident asperiores quod modi consectetur ex dolorum molestiae expedita voluptatem. Aperiam sed reiciendis neque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae voluptates odio ad maiores sint fuga quia consequatur placeat quaerat modi similique quas blanditiis pariatur ratione rerum, optio nostrum, esse saepe. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vitae iusto voluptatum quis perferendis consequuntur aspernatur temporibus praesentium assumenda et reiciendis sequi labore unde, neque dolores architecto veritatis numquam delectus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse tempora culpa vel consequatur quam? Maxime corrupti deleniti doloribus. Soluta ratione nihil eos ab architecto qui quas delectus et? Necessitatibus, perspiciatis? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis ea cupiditate alias repudiandae. Sequi accusamus nihil quis quidem vitae aspernatur odit quod soluta, placeat consequatur sed eum voluptas quo saepe!
            </p>
        
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam reiciendis sapiente quasi natus animi accusamus iure, blanditiis perspiciatis accusantium quo ipsam nihil ipsum ducimus, ipsa, ab voluptatem mollitia asperiores laudantium?
            </p>
        </div>
        <div class="col-3" style="border-left: thin solid gray">
            <div class="mb-5">
                <h5 class="text-primary"> Artikel Terbaru </h5>
                <hr class="mt-0 mb-2">

                @foreach($latest_articles as $article)
                <div class="mb-2">
                    <a href="{{ route('user-article.read', $article) }}" class="d-block text-muted"> {{ $article->title }} </a>
                    <small> @localized_date($article->published_date) </small>
                </div>
                @endforeach
            </div>

            <div>
                <h5 class="text-primary"> Penelitian Terbaru </h5>
                <hr class="mt-0 mb-2">
                @foreach($latest_researches as $research)
                <div class="mb-2">
                    <a href="{{ route('research.document', $research) }}" class="d-block text-muted"> {{ $research->title }} </a>
                    <small> @localized_date($research->created_at) </small>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</div>
@endsection

@section('extra-scripts')
<script>
    $('.carousel').carousel()
</script>
@endsection