@extends('shared.layout')
@section('title', 'Tambah Bibit')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Bibit
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Bibit
        </div>
        <div class="card-body">
            <form method='POST' action='{{ route('bibit.store') }}'>
                @csrf
                <div class='form-group'>
                    <label for='spesies'> Spesies: </label>

                    <input
                        id='spesies' name='spesies' type='text'
                        placeholder='Spesies'
                        value='{{ old('spesies', $bibit->spesies) }}'
                        class='form-control {{ !$errors->has('spesies') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('spesies') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='famili'> Famili: </label>

                    <input
                        id='famili' name='famili' type='text'
                        placeholder='Famili'
                        value='{{ old('famili', $bibit->famili) }}'
                        class='form-control {{ !$errors->has('famili') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('famili') }}
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary">
                        Tambah Bibit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
