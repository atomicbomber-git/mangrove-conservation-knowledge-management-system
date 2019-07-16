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
                    <label for='nama'> Nama: </label>

                    <input
                        id='nama' name='nama' type='text'
                        placeholder='Nama'
                        value='{{ old('nama') }}'
                        class='form-control {{ !$errors->has('nama') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('nama') }}
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
