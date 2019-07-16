@extends('shared.layout')
@section('title', $information->menu_title)
@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Informasi {{ $information->menu_title }}
        </div>

        <div class="card-body" id="app">
            @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])


            <form method='POST' action='{{ route('information.update', $information) }}'>
                @csrf

                <div class='form-group'>
                    <label for='title'> Judul: </label>

                    <input
                        id='title' name='title' type='text'
                        placeholder='Judul'
                        value='{{ old('title', $information->title) }}'
                        class='form-control {{ !$errors->has('title') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='content'> Isi: </label>

                    <textarea
                        id='content' name='content'
                        class='form-control {{ !$errors->has('content') ?: 'is-invalid' }}'
                        col='30' row='6'
                        ></textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('content') }}
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary">
                        Ubah Data
                    </button>
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
    editors[0].setContent(`{!! old('content', $information->content) !!}`)
})

</script>
@endsection
