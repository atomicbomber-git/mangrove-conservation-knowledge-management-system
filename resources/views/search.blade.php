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
            <form action="{{ route('search') }}" method="GET">
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

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="mode-definisis" name="mode" value="definisis"
                        {{ request('mode') === 'definisis' ? 'checked' : '' }}
                        class="custom-control-input">
                    <label class="custom-control-label" for="mode-definisis"> Rangkuman </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="mode-researches" name="mode" value="researches"
                        {{ (request('mode') === 'researches') || (request('mode') === null) ? 'checked' : '' }}
                        class="custom-control-input">
                    <label class="custom-control-label" for="mode-researches"> Hasil Penelitian </label>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary">
                        Cari
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @isset($google_scholar_query)
            <div class="mb-3">
                <a target="_blank" href="{{ $google_scholar_query }}">
                    <i class="fa fa-search"></i>
                    Hasil pencarian di Google Scholar
                </a>
            </div>
            @endisset

            @isset($researches)
                @include('research-search-result')
            @endisset

            @isset($definisis)
                @include('definisi-search-result')
            @endisset
        </div>
    </div>
</div>
@endsection
