@extends('shared.layout')
@section('title', 'Halaman Utama')
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slides as $slide)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img class="d-block w-100" style="height: 420px; object-fit: cover; filter: brightness(90%)" src="{{ route('slide.image', $slide) }}" alt="{{ $slide->name }}">
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
    </h1>
    
    <div class="row">
        <div class="col-md-9">
            <p>
                <em> Knowledge Management System </em> (KMS) Konservasi Hutan Mangrove merupakan sebuah <em> website </em> yang mendukung manajemen dan pengelolaan pengetahuan terkait konservasi mangrove. <em> Website </em> ini bertujuan untuk memberikan pengetahuan dan informasi kepada masyarakat, pemerintah, dan peneliti dalam melakukan pelestarian mangrove. <em> Knowledge Management System </em> hutan mangrove dapat membantu dalam pencarian, pemilihan, pengaturan, penyaringan dan penyajian informasi, menawarkan sebuah pendekatan yang saling terintegrasi. <em> Knowledge Management System </em> ini terdiri dari <em> tacit knowledge </em> dan <em> explicit knowledge </em> yang meliputi pembibitan, penanaman, dan perawatan untuk konservasi hutan mangrove. Tersedia artikel dan hasil penelitian yang dikelola oleh <em> Knowledge Management System </em>. <em> Knowledge Management System </em> ini terbuka untuk umum, terutama masyarakat yang dapat membagikan pengalamannya menjadi sebuah pengetahuan di <em> Knowledge Management System </em> ini.
            </p>
        </div>
        <div class="col-md-3" style="border-left: thin solid gray">
            <div class="mb-5">
                <h5 class="text-primary"> Artikel Terbaru </h5>
                <hr class="mt-0 mb-2">

                @foreach($latest_articles as $article)
                <div class="mb-2">
                    <a href="{{ route('user-article.read', $article) }}" class="d-block text-muted"> {{ $article->title }} </a>
                    <small> @localized_date($article->published_date) </small>
                </div>
                @endforeach

                <a href="{{ route('user-article.index') }}" class="text-info font-weight-bold">
                    SELURUH ARTIKEL
                </a>
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
                <a href="{{ route('user-research.index') }}" class="text-info font-weight-bold">
                    SELURUH HASIL PENELITIAN
                </a>
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