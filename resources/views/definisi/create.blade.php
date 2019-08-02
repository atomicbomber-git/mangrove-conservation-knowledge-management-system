@extends('shared.layout')
@section('title', 'Tambah Definisi')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Tambah Definisi
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-book"></i>
            Tambah Definisi
        </div>
        <div class="card-body">
            <form method='POST' enctype="multipart/form-data" action='{{ route('definisi.store') }}'>
                @csrf

                <div class='form-group'>
                    <label for='title'>
                        Judul:
                    </label>

                    <input
                        id='title'
                        name='title'
                        type='text'
                        placeholder='Judul'
                        value='{{ old('title') }}'
                        class='form-control {{ $errors->has('title') ? 'is-invalid' : '' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='image'>
                         Gambar:
                    </label>

                    <input
                        id='image'
                        name='image'
                        type='file'
                        class='form-control {{ !$errors->has('image') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('image') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='content'>
                        Isi:
                    </label>

                    <textarea
                        id='content'
                        name='content'
                        placeholder='Isi'
                        class='form-control {{ $errors->has('content') ? 'is-invalid' : '' }}'
                        cols='30'
                        rows="15"
                        >{{ old('content') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('content') }}
                    </div>
                </div>

                <div>
                    <input id="submit" type="submit" value="Perbarui Definisi" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
