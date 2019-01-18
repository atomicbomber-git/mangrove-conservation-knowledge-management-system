@extends('shared.layout')
@section('title', 'Pencarian Google Scholare')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-search'></i>
        Pencarian Google Scholar
    </h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('process-search') }}" method="POST">
                @csrf
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
</div>
@endsection