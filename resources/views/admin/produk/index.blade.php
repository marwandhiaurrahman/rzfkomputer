@extends('adminlte::page')

@section('title', 'Data Produk')

@section('content_header')
    <h1>Data Produk</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Produk</h3>
                    <div class="card-tools">
                        <a class="btn btn-sm btn-success" href="{{ route('produk.create') }}">+ Tambah Produk</a>
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
                                            <th>Publish</th>
                                            <th>Other</th>
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
                                                <td>{{ $produk->publish }}</td>
                                                <td>
                                                    <a href="/admin/produk/gambar/{{$produk->id}}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit Gambar"><i
                                                            class="fas fa-image"></i></a>
                                                    <a href="#" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit Ukuran"><i
                                                            class="fas fa-pencil-ruler"></i></a>

                                                    <a href="#" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit Warna"><i
                                                            class="fas fa-palette"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('produk.destroy', $produk->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-xs btn-primary"
                                                            href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                                    </form>
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
