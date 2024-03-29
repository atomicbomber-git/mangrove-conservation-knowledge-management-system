@extends('shared.layout')
@section('title', 'Sunting Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Artikel
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Artikel
        </div>
        <div class="card-body">
            <form method='POST' action='{{ route('user-article.update', $article) }}'>
                @csrf

                <div class='form-group'>
                    <label for='title'> Judul: </label>
                
                    <input
                        id='title' name='title' type='text'
                        placeholder='Judul'
                        value='{{ old('title', $article->title) }}'
                        class='form-control {{ !$errors->has('title') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='category_id'> Kategori: </label>
                    <select name='category_id' id='category_id' class='form-control'>
                        @foreach($categories as $category)
                        <option {{ old('category_id', $article->category_id) !== $category->id ?: 'selected' }} value='{{ $category->id }}'> {{ $category->name }} </option>
                        @endforeach
                    </select>
                    <div class='invalid-feedback'>
                        {{ $errors->first('category_id') }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md">
                        <div class='form-group'>
                            <label for='author_first_name'> Nama Depan Penulis: </label>
                        
                            <input
                                id='author_first_name' name='author_first_name' type='text'
                                placeholder='Nama Depan Penulis'
                                value='{{ old('author_first_name', $article->author_first_name) }}'
                                class='form-control {{ !$errors->has('author_first_name') ?: 'is-invalid' }}'>
                        
                            <div class='invalid-feedback'>
                                {{ $errors->first('author_first_name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class='form-group'>
                            <label for='author_last_name'> Nama Belakang Penulis: </label>
                        
                            <input
                                id='author_last_name' name='author_last_name' type='text'
                                placeholder='Nama Belakang Penulis'
                                value='{{ old('author_last_name', $article->author_last_name) }}'
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

                <div class="form-group text-left">
                    <button class="btn btn-primary">
                        Ubah Artikel
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
    editors[0].setContent(`{!! old('content', $article->content) !!}`)
})

</script>
@endsection