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
            <form method='POST' enctype="multipart/form-data" action='{{ route('definisi.update', $definisi) }}'>
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

                <figure class="figure">
                    <img src="{{ route('definisi.image', $definisi) }}" class="figure-img img-fluid rounded" alt="Gambar {{ $definisi->title }}">
                    <figcaption class="figure-caption text-xs-right"> Gambar Sekarang </figcaption>
                </figure>

                <div class='form-group'>
                    <label for='image'>
                         Gambar:
                    </label>

                    <input
                        id='image'
                        name='image'
                        type='file'
                        placeholder='Gambar'
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

@section('extra-scripts')
<script>

tinyMCE.init(Object.assign(window.tinymce_settings, {
    content_css: '{{ asset('css/app.css') }}',
}))
.then(editors => {
    editors[0].setContent(`{!! old('content', $definisi->content) !!}`)
})

</script>
@endsection
