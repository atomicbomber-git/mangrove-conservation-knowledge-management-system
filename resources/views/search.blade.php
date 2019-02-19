@extends('shared.layout')
@section('title', 'Pencarian Google Scholare')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-search'></i>
        Pencarian Hasil Penelitian
    </h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('process_search') }}" method="GET">
                <div class='form-group'>
                    <label for='keyword'> Kata Kunci: </label>
                
                    <input
                        id='keyword' name='keyword' type='text'
                        placeholder='Kata Kunci'
                        value='{{ old('keyword') }}'
                        class='form-control {{ !$errors->has('keyword') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('keyword') }}
                    </div>
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-secondary">
                        Cari
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @isset($researches)
    <div class="card">
        <div class="card-body">
            @if(null !== request('keyword'))
            
            <div class="alert alert-info mb-5">
                Menampilkan hasil pencarian ke {{ $researches->firstItem() }}-{{ $researches->lastItem() }} 
                dari {{ $researches_count }} hasil
                untuk kata kunci: <strong> {{ implode(", ", $splitted_keywords) }} </strong>
            </div>

            @else

            <div class="alert alert-info mb-5">
                Menampilkan seluruh hasil penelitian
            </div>

            @endif

            @if(isset($researches))

            @forelse ($researches as $research)
            <h5> {{ $research->title }} ({{ $research->year }}) </h5>
            <p>
            @foreach ($research->authors as $author)
                <span class="text-success font-weight-bold">
                    {{ $author->name }}{{ !$loop->last ? ', ' : '' }}
                </span>
            @endforeach
            </p>
            <p> {{ str_limit($research->description, 200) }} </p>
            <a href="{{ route('research.document', $research) }}"> Unduh Dokumen </a>
            <hr/>
            @empty
                
            @endforelse

            @endif
        </div>

        <div class="d-flex justify-content-center">
            {{ $researches->appends(['keyword' => request('keyword')])->links() }}
        </div>
    </div>
    @endif
</div>
@endsection