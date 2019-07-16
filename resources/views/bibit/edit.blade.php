@extends('shared.layout')
@section('title', 'Sunting Bibit')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Bibit
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Bibit
        </div>
        <div class="card-body">
            <form method='POST' action='{{ route('bibit.update', $bibit) }}'>
                @csrf

                <div class='form-group'>
                    <label for='nama'> Nama: </label>

                    <input
                        id='nama' name='nama' type='text'
                        placeholder='Nama'
                        value='{{ old('nama', $bibit->nama) }}'
                        class='form-control {{ !$errors->has('nama') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('nama') }}
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary">
                        Ubah Bibit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
