@extends('shared.layout')
@section('title', 'Sunting Definisi')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Definisi
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-book"></i>
            Sunting Definisi
        </div>
        <div class="card-body">
            <form method='POST' action='{{ route('definisi.update', $definisi) }}'>
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
                        value='{{ old('title', $definisi->title) }}'
                        class='form-control {{ $errors->has('title') ? 'is-invalid' : '' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='content'>
                        Isi:
                    </label>

                    <textarea
                        id='content'
                        name='content'
                        class='form-control {{ $errors->has('content') ? 'is-invalid' : '' }}'
                        cols='30'
                        rows="15"
                        >{{ old('content', $definisi->content) }}</textarea>

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
