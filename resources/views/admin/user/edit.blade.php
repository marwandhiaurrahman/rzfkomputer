@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Input data user</h3>
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
                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user], 'files' => false]) !!}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputNama">Nama</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama', 'id' => 'inputNama', 'required', 'autofocus']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputEmail">Email</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Alamat Email', 'id' => 'inputEmail', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="password">Pasword</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Masukkan password jika ingin dirubah', 'id' => 'password']) !!}
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
