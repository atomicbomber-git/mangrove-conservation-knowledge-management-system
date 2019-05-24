@extends('shared.layout')
@section('title', 'Tambah Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Artikel
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Artikel
        </div>
        <div class="card-body">
            <form action="{{ route('user-article.store') }}" method="POST">
                @csrf
                <div class='form-group'>
                    <label for='title'> Judul: </label>
                
                    <input
                        id='title' name='title' type='text'
                        placeholder='Judul'
                        value='{{ old('title') }}'
                        class='form-control {{ !$errors->has('title') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>
    
                <div class='form-group'>
                    <label for='category_id'> Kategori: </label>
                    <select name='category_id' id='category_id' class='form-control'>
                        @foreach($categories as $category)
                        <option {{ old('category_id') !== $category->id ?: 'selected' }} value='{{ $category->id }}'> {{ $category->name }} </option>
                        @endforeach
                    </select>
                    <div class='invalid-feedback'>
                        {{ $errors->first('category_id') }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class='form-group'>
                            <label for='author_first_name'> Nama Depan Penulis: </label>
                        
                            <input
                                id='author_first_name' name='author_first_name' type='text'
                                placeholder='Nama Depan Penulis'
                                value='{{ old('author_first_name') }}'
                                class='form-control {{ !$errors->has('author_first_name') ?: 'is-invalid' }}'>
                        
                            <div class='invalid-feedback'>
                                {{ $errors->first('author_first_name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class='form-group'>
                            <label for='author_last_name'> Nama Belakang Penulis: </label>
                        
                            <input
                                id='author_last_name' name='author_last_name' type='text'
                                placeholder='Nama Belakang Penulis'
                                value='{{ old('author_last_name') }}'
                                class='form-control {{ !$errors->has('author_last_name') ?: 'is-invalid' }}'>
                        
                            <div class='invalid-feedback'>
                                {{ $errors->first('author_last_name') }}
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class='form-group'>
                    <label for='content'> Isi: </label>
                
                    <textarea
                        id='content' name='content'
                        class='form-control {{ !$errors->has('content') ?: 'is-invalid' }}'
                        ></textarea>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('content') }}
                    </div>
                </div>
    
                <div class="form-group">
                    <button class="btn btn-primary">
                        Tambah Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>

tinyMCE.init({
    selector: '#content',
    body_class: 'tinymce-editor',
    plugins: 'lists,image,imagetools',
    image_caption: true,
    file_picker_callback: window.file_picker_callback,
    toolbar: [
        'undo redo | styleselect | bold italic | numlist bullist | alignleft aligncenter alignright | image'
    ],
    height: 400,
    content_css: '{{ asset('css/app.css') }}',
})
.then(editors => {
    editors[0].setContent(`{!! old('content') !!}`)
})

</script>
@endsection