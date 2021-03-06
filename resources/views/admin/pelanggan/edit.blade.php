@extends('adminlte::page')

@section('title', 'Edit Pelanggan')

@section('content_header')
    <h1>Edit Pelanggan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Input data pelanggan</h3>
                </div>
                {!! Form::model($pelanggan, ['method' => 'PATCH', 'route' => ['pelanggan.update', $pelanggan], 'files' => false]) !!}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputNama">Nama</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama', 'id' => 'inputNama', 'required', 'autofocus']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputAlamat">Alamat Lengkap</label>
                        <div class="col-sm-10 col-md-6 col-lg-6">
                            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 5, 'id' => 'inputAddress', 'placeholder' => 'Masukan Alamat','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputTelepon">No Telepon</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {!! Form::number('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Masukkan No Telepon', 'id' => 'inputTelepon', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputEmail">Email</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Alamat Email', 'id' => 'inputEmail', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 col-md-6 col-lg-4 offset-sm-2">
                            <button type="submit" class="btn btn-success">Edit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger" required>Kembali</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
