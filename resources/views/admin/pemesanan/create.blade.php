@extends('adminlte::page')

@section('title', 'Tambah Pemesanan')

@section('content_header')
    <h1>Tambah Pemesanan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Data Keranjang Pemesanan</h3>
                    <div class="card-tools">
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="inputNama">Nama</label>
                                <div class="col-sm-10 col-md-6 col-lg-4">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama', 'id' => 'inputNama', 'required', 'autofocus']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="inputAlamat">Alamat Lengkap</label>
                                <div class="col-sm-10 col-md-6 col-lg-6">
                                    {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 5, 'id' => 'inputAddress', 'placeholder' => 'Masukan Alamat', 'required']) !!}
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
                            {{-- <div class="form-group row">
                                <div class="col-sm-10 col-md-6 col-lg-4 offset-sm-2">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger" required>Kembali</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id=""
                                    class="table table-bordered table-striped js-data-table dataTable no-footer dtr-inline collapsed"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Kuantitas</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems->getContent() as $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <form action="{{ route('pemesanan.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="number" name="quantity" min="0"
                                                            value="{{ $item->quantity }}" class="form-control col-3"
                                                            onchange="this.form.submit()" />
                                                    </form>
                                                </td>
                                                <td>{{ $item->quantity * $item->price }}</td>
                                                <td>
                                                    <form action="{{ route('pemesanan.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                        <button class="btn btn-xs btn-danger">Hapus</button>
                                                    </form>
                                                    {{-- <form action="{{ route('produk.destroy', $produk->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-xs btn-primary"
                                                            href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <td colspan="4">Total</td>
                                        <td>{{ $cartItems->getTotal() }}</td>
                                        <td></td>

                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-success col-sm-12">Buat Pesanan</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Data Produk</h3>
                    <div class="card-tools">
                        {{-- <a class="btn btn-sm btn-success" href="{{ route('produk.create') }}">+ Tambah Pemesanan</a> --}}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="DataTable"
                                    class="table table-bordered table-striped js-data-table dataTable no-footer dtr-inline collapsed"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $produk->name }}</td>
                                                <td>{{ $produk->kategori->name }}</td>
                                                <td>{{ $produk->stok }}</td>
                                                <td>{{ $produk->harga }}</td>
                                                <td>{{ $produk->diskon }}</td>
                                                <td>
                                                    <form action="{{ route('pemesanan.store', [$produk]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $produk->id }}" name="produk_id">
                                                        <input type="hidden" value="{{ $produk->name }}" name="name">
                                                        <input type="hidden" value="{{ $produk->harga }}" name="harga">
                                                        <input type="hidden" value="{{ $produk->diskon }}" name="diskon">
                                                        <input type="hidden" value="1" name="kuantitas">
                                                        <button class="btn btn-xs btn-primary"><i
                                                                class="fas fa-cart-plus m-1"></i> Add To
                                                            Cart</button>
                                                    </form>
                                                    {{-- <form action="{{ route('produk.destroy', $produk->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-xs btn-primary"
                                                            href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
@section('js')
    <!-- DataTables -->
    <script>
        $(function() {
            $('#DataTable').DataTable({

            });
        });
    </script>
@stop
