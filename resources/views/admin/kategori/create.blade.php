@extends('adminlte::page')

@section('title', 'Tambah Kategori')

@section('content_header')
    <h1>Tambah Kategori</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Input Data Kategori</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['route' => 'kategori.store', 'method' => 'POST', 'files' => false]) !!}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputNama">Nama Kategori</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama', 'id' => 'inputNama', 'required', 'autofocus']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 col-md-6 col-lg-4 offset-sm-2">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger" required>Kembali</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
