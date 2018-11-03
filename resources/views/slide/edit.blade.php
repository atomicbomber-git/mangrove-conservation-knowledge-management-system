@extends('shared.layout')
@section('title', 'Sunting Slide')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Slide
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card" style="max-width: 30rem">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Slide
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('slide.update', $slide) }}" enctype="multipart/form-data">
                @csrf
                <div class='form-group'>
                    <label for='name'> Nama: </label>
                
                    <input
                        id='name' name='name' type='text'
                        placeholder='Nama'
                        value='{{ old('name', $slide->name) }}'
                        class='form-control {{ !$errors->has('name') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('name') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='description'> Deskripsi: </label>
                
                    <textarea
                        id='description' name='description'
                        class='form-control {{ !$errors->has('description') ?: 'is-invalid' }}'
                        col='30' row='6'
                        >{{ old('description', $slide->description) }}</textarea>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('description') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="old_image"> Gambar Lama: </label>
                    <img src="{{ route('slide.image', $slide) . "?" . time() }}" class="d-block img-fluid" alt="{{ $slide->name }}">
                </div>

                <div class="alert alert-warning">
                    <i class="fa fa-warning"></i>
                    Kosongkan kolom dibawah jika Anda tidak ingin mengubah gambar.
                </div>

                <div class="form-group">
                    <label for="image"> Gambar Baru: </label>
                    <input name="image" type="file" class="d-block">
                    <div class="text-danger mt-2">
                        {{ $errors->first('image') }}
                    </div>
                </div>

                <div class="form-group">
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