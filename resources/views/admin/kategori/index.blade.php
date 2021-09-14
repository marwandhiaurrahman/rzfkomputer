@extends('adminlte::page')

@section('title', 'Data Kategori')

@section('content_header')
    <h1>Data Kategori</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kategori</h3>
                    <div class="card-tools">
                        <a class="btn btn-sm btn-success" href="{{ route('kategori.create') }}">+ Tambah Kategori</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="DataTable" class="table table-bordered table-striped js-data-table dataTable no-footer dtr-inline collapsed"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoris as $kategori)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $kategori->name }}</td>
                                                <td>
                                                    <form action="{{ route('kategori.destroy', $kategori->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-xs btn-primary"
                                                            href="{{ route('kategori.edit', $kategori->id) }}">Edit</a>
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
