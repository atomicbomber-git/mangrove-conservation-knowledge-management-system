@extends('shared.layout')
@section('title', 'Sunting Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Hasil Penelitian
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card" style="max-width: 30rem">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Hasil Penelitian
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('research.update', $research) }}" enctype="multipart/form-data">
                @csrf
                <div class='form-group'>
                    <label for='title'> Judul: </label>
                
                    <input
                        id='title' name='title' type='text'
                        value='{{ old('title', $research->title) }}'
                        class='form-control {{ !$errors->has('title') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_id"> Kategori: </label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option {{ old("category_id") === $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="alert alert-warning">
                    <i class="fa fa-warning"></i>
                    Kosongkan kolom dokumen jika Anda tidak hendak mengubah dokumen.
                </div>

                <div class="form-group">
                    <label for="document"> Dokumen: </label>
                    <input class="form-control" name="document" type="file" accept="pdf">
                    <div class="invalid-feedback">
                        {{ $errors->first('document') }}
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary">
                        Ubah Data
                        <i class="fa fa-check"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection